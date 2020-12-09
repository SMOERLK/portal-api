<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TODO: add all tv
        $data = [
            [
                'id' => 103,
                'option_type' => 'tv_channels',
                'option' => 'Sirasa TV',
                'value' => 'sirasa_tv',
                'visible' => 1,
                'order' => 1
            ],
            //TODO: List all TV channels
            [
                'id' => 104,
                'option_type' => 'tv_channels',
                'option' => 'Hiru TV',
                'value' => 'hiru_tv',
                'visible' => 1,
                'order' => 2
            ],
            //TODO: List all radio channels
            [
                'id' => 105,
                'option_type' => 'radio_channels',
                'option' => 'Hiru FM',
                'value' => 'hiru_FM',
                'visible' => 1,
                'order' => 1
            ],
            //TODO: List all connection types
            [
                'id' => 106,
                'option_type' => 'internet_connection_devices',
                'option' => 'CDMA',
                'value' => 'cdma',
                'visible' => 1,
                'order' => 1
            ],
            //TODO: List all devices
            [
                'id' => 107,
                'option_type' => 'devices',
                'option' => 'Laptop',
                'value' => 'laptop',
                'visible' => 1,
                'order' => 1
            ],

        ];
        // DB::table('config_item_options')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       $ids = [103,104,105];
       DB::table('config_item_options')
       ->whereIn('id',$ids)
       ->delete();
    }
}
