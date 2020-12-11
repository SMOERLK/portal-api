<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Http\Controllers\Controller;
use App\Models\School_channels;
use App\Models\School_utilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;

class InstitutionsController extends Controller
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

    public function list(HttpRequest $request)
    {
        $queryStrings = $request->except('limit', 'order_by', 'order', 'page', 'count', 'current_page', 'last_page', 'next_page_url', 'per_page', 'previous_page_url', 'total', 'url', 'from', 'to');

        $limit = ($request->input('limit') ? $request->input('limit') : '10');
        $order_by = ($request->input('order') ? $request->input('order') : 'student_id');
        $order = ($request->input('order_by') ? $request->input('order_by') : 'desc');
        $page = ($request->input('page') ? $request->input('page') : '1');

        if (!is_null(Auth::user()->SecurityGroup)) {
            $userInstitutions = Auth::user()->SecurityGroup->UserInstitutions->toArray();

            $userInstitutions = array_column($userInstitutions, 'institution_id');

            $query = Institution::whereIn('id', $userInstitutions)
                ->with(['TvChannels', 'RadioChannels', 'additionalData']);

            foreach ($queryStrings as $key => $value) {
                $query->where($key, '=',  $value);
            }

            $data = array();
            $data = $query->get();
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['data' => []]);
        }
    }

    /**
     * update School Info
     *
     * @param HttpRequest $request
     * @param [type] $id
     * @return array
     */
    public function update(HttpRequest $request, $id)
    {
        $institutionId = $request->input('id');
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

            School_utilities::CreateOrUpdate($additional_data);
            array_walk($tv_channels, School_channels::class . '::CreateOrUpdate', 'tv');
            array_walk($radio_channels, School_channels::class . '::CreateOrUpdate', 'radio');

            $response = [
                'additional_data' => $additional_data,
                'tv_channels' => $tv_channels,
                'radio_channels' => $radio_channels
            ];

            return response()->json(['data' => $response]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * Implement rules method
     *
     * @return array
     */
    public function rules()
    {
        //TODO Need to add list of channels and devices for validation
        $rules = [
            'id' => 'required|integer',
            'additional_data.has_internet_connection' => 'required|boolean',
            'additional_data.has_electricity' => 'required|boolean',
            'additional_data.has_telephone' => 'required|boolean',
            'tv_channels.*.channel_id' => 'in:103,104',
            'radio_channels.*.channel_id' => 'in:105',
        ];
        return $rules;
    }

    public function deleteChannels($request)
    {
        $tv_channels = $request->input('tv_channels');
        $radio_channels = $request->input('radio_channels');
        $institutionId =  $request->input('id');
        $all_channels = School_channels::select('channel_id')->where('institution_id', $institutionId)->get()->toArray();
        $all_channels = array_column($all_channels, 'channel_id');
        $updated_channels = array_column(array_merge($tv_channels, $radio_channels), 'channel_id');
        $deleted_channels = array_diff($all_channels, $updated_channels);
        School_channels::where('institution_id', $institutionId)->whereIn('channel_id', $deleted_channels)->delete();
    }
}
