<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewSecurityRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            'name' => 'Data Entry Operator',
            'code' => 'deo',
            'order' => 7,
            'visible' => 1,
            'security_group_id' => -1,
            'created_user_id' => 1,
            'created' => '2019-03-22 07:02:16'

        ];
        DB::table('security_roles')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
