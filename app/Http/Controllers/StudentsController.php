<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Institution_student;
use App\Models\Student_additional_data;
use App\Models\Student_channels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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
    
    public function list(HttpRequest $request){
        $queryStrings = $request->except('limit', 'order_by', 'order', 'page', 'count', 'current_page', 'last_page', 'next_page_url', 'per_page', 'previous_page_url', 'total', 'url', 'from', 'to');
        $limit = ($request->input('limit') ? $request->input('limit') : '10');
        $order_by = ($request->input('order') ? $request->input('order') : 'student_id');
        $order = ($request->input('order_by') ? $request->input('order_by') : 'desc');
        $page = ($request->input('page') ? $request->input('page') : '1');
        $institutionId = $request->input('institution_id') ? $request->input('institution_id') : null;

        if($limit >= 100) {
            $limit = 100;
        }

        $userInstitutions = Auth::user()->SecurityGroup->UserInstitutions->toArray();

        $userInstitutions = array_column($userInstitutions,'institution_id');

        if(in_array($institutionId ,$userInstitutions)) {
            $query = Institution_student::query()
            ->with(['studentProfile','TvChannels','RadioChannels','additionalData'])
            ->where('institution_id',$institutionId);
    
            foreach ($queryStrings as $key => $value) {
                $query->where($key, '=',  $value);
            }
    
            $query->orderBy($order_by, $order);
            $query->offset($page);
            $query->simplePaginate($limit);
    
            $data = array();
            $data = $query->get();
    
            return response()->json(['data' => $data]);
        }else{
            return response()->json('UnAuthorized');
        }       
    }


    public function update(HttpRequest $request,$id){
        $profile =  $request->input('student_profile');
        $tv_channels = $request->input('tv_channels');
        $radio_channels = $request->input('radio_channels');
        $additional_data = $request->input('additional_data');

        Student_additional_data::CreateOrUpdate($additional_data);

        //TODO Delete channels by checking if the new array without records in the DB
        

        array_walk($tv_channels,Student_channels::class.'::CreateOrUpdate','tv');
        array_walk($radio_channels,Student_channels::class.'::CreateOrUpdate','radio');

        $response = [
            'student_profile' => $profile,
            'additional_data' => $additional_data,
            'tv_channels' => $tv_channels,
            'radio_channels' => $radio_channels
        ];

        return response()->json(['data' => $response]);

    }
}