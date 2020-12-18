<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //

    public function __construct()
    {
        $this->userArea = [];
        $this->userInstitutions = [];
        if (!is_null(Auth::user())) {
            $userInstitutions = Auth::user()->load('Institutions')->toArray()['institutions'];
            array_map(function ($value) {
                return array_map(function ($group) {
                   array_push($this->userInstitutions,$group['institution_id']);
                }, $value['user_institutions']);
            }, $userInstitutions);
            $userArea = Auth::user()->load('Areas')->toArray()['areas'];
            array_map(function ($value) {
                if (!empty($value['user_areas'])) {
                    return array_map(function ($group) {
                        array_push($this->userArea,$group['area_id']);
                    }, $value['user_areas']);
                }
            }, $userArea);
            $institutions = Institution::select('id')->whereIn('area_id',$this->userArea)->get()->toArray();
            $this->userInstitutions = array_merge(array_column($institutions,'id'),$this->userInstitutions);
        } 
    }

    public function popChannelKey($array)
    { 
        $array['tv_channels'] = array_column($array['tv_channels'],'channel_id');
        $array['radio_channels'] = array_column($array['radio_channels'],'channel_id');

        return $array;
    }

    
}
