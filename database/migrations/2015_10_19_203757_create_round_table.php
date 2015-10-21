<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_round',function(Blueprint $table){
            $table->increments('id');
            $table->integer('team_id');
            $table->integer('challenge_id');
            $table->integer('stage_id');
            $table->time('schedule_start');
            $table->time('schedule_end');
            $table->date('day');
            $table->boolean('active')->default(1);
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
        Schema::drop('rb_round');
    }
}
