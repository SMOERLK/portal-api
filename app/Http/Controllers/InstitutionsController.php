<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request as HttpRequest;

class InstitutionsController extends Controller{


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

        $userInstitutions = Auth::user()->SecurityGroup->UserInstitutions->toArray();

        $userInstitutions = array_column($userInstitutions,'institution_id');

        $query = Institution::whereIn('id',$userInstitutions)
        ->with(['TvChannels','RadioChannels']);

        foreach ($queryStrings as $key => $value) {
            $query->where($key, '=',  $value);
        }

        $data = array();
        $data = $query->get();
        return response()->json(['data' => $data]);
    }
}