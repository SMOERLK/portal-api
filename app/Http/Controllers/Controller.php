<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //

    public function popChannelKey($array)
    { 
        $array['tv_channels'] = array_column($array['tv_channels'],'channel_id');
        $array['radio_channels'] = array_column($array['radio_channels'],'channel_id');

        return $array;
    }
}
