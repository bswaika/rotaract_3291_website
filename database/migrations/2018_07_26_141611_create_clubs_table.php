<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Make Sure everything is set to nullable except for unique columns for all migrations before deployment
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zone_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('shorthand');
            $table->string('website');
            $table->longText('about');
            $table->string('logo');
            $table->string('established_in');
            $table->string('parent_rotary');
            $table->string('fb_link');
            $table->string('tw_link');
            $table->string('ins_link');
            $table->integer('points');
            $table->boolean('visibility');
            $table->timestamps();

            $table->foreign('zone_id')->references('id')->on('zones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}
