<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombatRoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_combat_round',function(Blueprint $table){
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('stage_id');
            $table->integer('versus_one');
            $table->integer('versus_two');
            $table->integer('challenge_id');
            $table->time('schedule_start');
            $table->time('schedule_end');
            $table->boolean('actived')->default(1);
            $table->boolean('completed')->default(0);
            $table->boolean('evaluation')->default(0);
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
        Schema::drop('rb_combat_round');
    }
}
