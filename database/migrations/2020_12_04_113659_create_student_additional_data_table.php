<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAdditionalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_additional_data', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id',false);
            $table->integer('type_of_device')->length(2);
            $table->integer('type_of_device_at_home')->length(2);
            $table->boolean('internet_at_home');
            $table->integer('internet_device');
            $table->integer('institution_id');
            $table->boolean('tv_at_home');
            $table->boolean('satellite_tv__at_home');
            $table->index(['student_id','institution_id'],'institution_student_id');
            $table->unique('student_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_additional_data');
    }
}
