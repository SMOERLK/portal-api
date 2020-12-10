<?php

namespace App\Http\Controllers;

use App\Models\Institution_student;
use App\Models\Student_additional_data;
use App\Models\Student_channels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;

class StudentsController extends Controller
{

    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get Students data , with pagination
     *
     * @param HttpRequest $request
     * @return void
     */
    public function list(HttpRequest $request)
    {
        $queryStrings = $request->except('limit', 'order_by', 'order', 'page', 'count', 'current_page', 'last_page', 'next_page_url', 'per_page', 'previous_page_url', 'total', 'url', 'from', 'to');
        $limit = ($request->input('limit') ? $request->input('limit') : '10');
        $order_by = ($request->input('order') ? $request->input('order') : 'student_id');
        $order = ($request->input('order_by') ? $request->input('order_by') : 'desc');
        $page = ($request->input('page') ? $request->input('page') : '1');
        $institutionId = $request->input('institution_id') ? $request->input('institution_id') : null;

        if ($limit >= 100) {
            $limit = 100;
        }

        $userInstitutions = Auth::user()->SecurityGroup->UserInstitutions->toArray();

        $userInstitutions = array_column($userInstitutions, 'institution_id');

        if (in_array($institutionId, $userInstitutions)) {
            $query = Institution_student::query()
                ->with(['studentProfile', 'TvChannels', 'RadioChannels', 'additionalData'])
                ->where('institution_id', $institutionId);

            foreach ($queryStrings as $key => $value) {
                $query->where($key, '=',  $value);
            }

            $query->orderBy($order_by, $order);
            $query->offset($page);
            $query->simplePaginate($limit);

            $data = array();
            $data = $query->get();

            return response()->json(['data' => $data]);
        } else {
            return response()->json('UnAuthorized');
        }
    }


    /**
     * Update students data
     *
     * @param HttpRequest $request
     * @param [type] $id
     * @return array
     */
    public function update(HttpRequest $request, $id)
    {
        $institutionId = $request->input('institution_id');
        $profile =  $request->input('student_profile');
        $tv_channels = $request->input('tv_channels');
        $radio_channels = $request->input('radio_channels');
        $additional_data = $request->input('additional_data');


        //Validate all inputs
        $this->validate($request, $this->rules());

         //Delete all deleted channels
        $this->deleteChannels($request); 

        $userInstitutions = Auth::user()->SecurityGroup->UserInstitutions->toArray();

        $userInstitutions = array_column($userInstitutions, 'institution_id');
        if (in_array($institutionId, $userInstitutions)) {
            Student_additional_data::CreateOrUpdate($additional_data);
            array_walk($tv_channels, Student_channels::class . '::CreateOrUpdate');
            array_walk($radio_channels, Student_channels::class . '::CreateOrUpdate');
            $response = [
                'student_profile' => $profile,
                'additional_data' => $additional_data,
                'tv_channels' => $tv_channels,
                'radio_channels' => $radio_channels
            ];

            return response()->json(['data' => $response]);
        } else {
            return response()->json('UnAuthorized');
        }
    }

    /**
     * Implement rules method
     *
     * @return array
     */
    public function rules(){
        //TODO Need to add list of channels and devices for validation
        $rules = [
            'institution_id' => 'required|integer',
            'additional_data.type_of_device'=> 'required|integer|in:107',
            'additional_data.type_of_device_at_home' => 'required|integer|in:107',
            'additional_data.internet_at_home' => 'required|boolean',
            'additional_data.internet_device' => 'required|integer|in:106',
            'additional_data.tv_at_home' => 'required|boolean',
            'additional_data.satellite_tv__at_home' => 'required|boolean',
            'tv_channels.*.channel_id' => 'in:103,104',
            'radio_channels.*.channel_id' => 'in:105',
        ];
        return $rules;
    }

    /**
     * Delete all channels by reading new channels object array
     *
     * @param [type] $request
     * @return void
     */
    public function deleteChannels($request){
        $tv_channels = $request->input('tv_channels');
        $radio_channels = $request->input('radio_channels');
        $studentId =  $request->input('student_id');
        $all_channels = Student_channels::select('channel_id')->where('student_id',$studentId)->get()->toArray();
        $all_channels = array_column($all_channels,'channel_id');
        $updated_channels = array_column(array_merge($tv_channels,$radio_channels),'channel_id');
        $deleted_channels = array_diff($all_channels,$updated_channels);
        Student_channels::where('student_id',$studentId)->whereIn('channel_id',$deleted_channels)->delete();
    }
}
