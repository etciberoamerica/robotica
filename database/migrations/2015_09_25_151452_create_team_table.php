<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team',function(Blueprint $table){
            $table->increments('id');
            $table->integer('institution_id');
            $table->string('name');
            $table->string('name_altered');
            $table->string('robot_name');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->enum('gender',['MAS','FEM','MIX']);
            $table->integer('challenge_id');
            $table->integer('degree_id');
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
        Schema::drop('team');
    }
}