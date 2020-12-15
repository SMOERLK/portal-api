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
        $this->userArea = [];
        $this->userInstitutions = [];
        if (!is_null(Auth::user())) {
            $userInstitutions = Auth::user()->SecurityGroup->UserInstitutions->toArray();
            $userArea = Auth::user()->SecurityGroup->UserAreas->toArray();
            $this->userArea = array_column($userArea, 'area_id');
            $institutionsIds = Institution::select('id')->whereIn('area_id',$this->userArea)->get()->toArray();
            $institutionsIds = array_column($institutionsIds,'id');
            $this->userInstitutions = array_column($userInstitutions, 'institution_id');
            $this->userInstitutions = array_merge($this->userInstitutions,$institutionsIds);

        }
    }

    public function list(HttpRequest $request)
    {
        $queryStrings = $request->except('limit', 'order_by', 'order', 'page', 'count', 'current_page', 'last_page', 'next_page_url', 'per_page', 'previous_page_url', 'total', 'url', 'from', 'to');

        $limit = ($request->input('limit') ? $request->input('limit') : '10');
        $order_by = ($request->input('order') ? $request->input('order') : 'id');
        $order = ($request->input('order_by') ? $request->input('order_by') : 'desc');
        $page = ($request->input('page') ? $request->input('page') : '1');

        if ($limit >= 100) {
            $limit = 100;
        }

        $query = Institution::whereIn('id', $this->userInstitutions)
            ->orWhereIn('area_id', $this->userArea)
            ->with(['TvChannels', 'RadioChannels', 'additionalData']);

        foreach ($queryStrings as $key => $value) {
            $query->where($key, '=',  $value);
        }

        $query->orderBy($order_by, $order);
        $query->offset($page);
        $query->simplePaginate($limit);

        $data = array();
        $data = $query->get()->toArray();
        $newArray = array();
        $data = array_map(array($this,'popChannelKey'),$data);
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
        $tv_channels = $request->input('tv_channels') ? $request->input('tv_channels') : [];
        $radio_channels = $request->input('radio_channels') ?  $request->input('radio_channels') : [];
        $additional_data = $request->input('additional_data');

        //Validate all inputs
        $this->validate($request, $this->rules());

        //Delete all deleted channels
        $this->deleteChannels($request,$id);
        $additional_data['institution_id'] = $id;
        School_utilities::CreateOrUpdate($additional_data);
        array_walk($tv_channels, School_channels::class . '::CreateOrUpdate', $id);
        array_walk($radio_channels, School_channels::class . '::CreateOrUpdate',  $id);

        $response = [
            'additional_data' => $additional_data,
            'tv_channels' => $tv_channels,
            'radio_channels' => $radio_channels
        ];

        return response()->json(['message' => 'Success','data' => $response]);
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
            'id' => 'required|integer|in:'.implode(',',$this->userInstitutions),
            'additional_data.has_internet_connection' => 'required|boolean',
            'additional_data.has_electricity' => 'required|boolean',
            'additional_data.has_telephone' => 'required|boolean',
            'tv_channels.*' => 'exists:config_item_options,id,option_type,tv_channels',
            'radio_channels.*' =>  'exists:config_item_options,id,option_type,radio_channels',
        ];
        return $rules;
    }

    public function deleteChannels($request,$institutionId)
    {
        $tv_channels = $request->input('tv_channels') ? $request->input('tv_channels') : [];
        $radio_channels = $request->input('radio_channels') ?  $request->input('radio_channels') : [];
        $all_channels = School_channels::select('channel_id')->where('institution_id', $institutionId)->get()->toArray();
        $all_channels = array_column($all_channels, 'channel_id');
        $updated_channels = array_merge($tv_channels, $radio_channels);
        $deleted_channels = array_diff($all_channels, $updated_channels);
        School_channels::where('institution_id', $institutionId)->whereIn('channel_id', $deleted_channels)->delete();
    }
}
