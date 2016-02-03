<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombatSorpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_challenge_sorpresa',function(Blueprint $table){
            $table->increments('id');
            $table->integer('team_id');
            $table->integer('score')->nullable();
            $table->integer('firm')->nullable();
            $table->string('time')->nullable();
            $table->boolean('extra_1')->nullable();
            $table->boolean('extra_2')->nullable();
            $table->time('schedule_start');
            $table->time('schedule_end');
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
        Schema::drop('rb_challenge_sorpresa');
    }
}
