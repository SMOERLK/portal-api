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


        //Validate all inputs
        $this->validate($request, $this->rules());

         //Delete all deleted channels
        $this->deleteChannels($request); 

        $userInstitutions = Auth::user()->SecurityGroup->UserInstitutions->toArray();

        $userInstitutions = array_column($userInstitutions, 'institution_id');
        if (in_array($institutionId, $userInstitutions)) {
            
            array_walk($tv_channels, School_channels::class . '::CreateOrUpdate');
            array_walk($radio_channels, School_channels::class . '::CreateOrUpdate');
            $response = [
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
            'tv_channels.*.channel_id' => 'in:103,104',
            'radio_channels.*.channel_id' => 'in:105',
        ];
        return $rules;
    }

}