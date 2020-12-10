<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_utilities', function (Blueprint $table) {
            $table->id();
            $table->integer('institution_id',false);
            $table->boolean('has_internet_connection');
            $table->boolean('has_electricity');
            $table->boolean('has_telephone');
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
        Schema::dropIfExists('school_utilities');
    }
}
