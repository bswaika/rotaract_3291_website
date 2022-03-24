<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('club_id')->unsigned();
            $table->string('name');
            $table->string('venue');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('reg_open_date');
            $table->date('reg_close_date');
            $table->integer('reg_amount');
            $table->string('fb_link');
            $table->string('tw_link');
            $table->string('ins_link');
            $table->boolean('status');
            $table->boolean('visibility');
            $table->timestamps();

            $table->foreign('club_id')->references('id')->on('clubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
