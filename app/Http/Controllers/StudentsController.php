<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Institution_student;
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

}