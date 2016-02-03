<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationComTeamWin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_relation_com_tea',function(Blueprint $table){
            $table->increments('id');
            $table->integer('combat_id');
            $table->integer('team_id_win');
            $table->integer('team_id_one');
            $table->integer('scort_team_one');
            $table->integer('firm_team_one');
            $table->integer('team_id_two');
            $table->integer('scort_team_two');
            $table->integer('firm_team_two');
            $table->boolean('penalties')->default(0);
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
        Schema::drop('rb_relation_com_tea');
    }
}
