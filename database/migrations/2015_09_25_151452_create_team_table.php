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
        Schema::create('rb_team',function(Blueprint $table){
            $table->increments('id');
            $table->integer('institution_id');
            $table->string('name');
            $table->string('name_altered');
            $table->string('robot_name');
            $table->enum('gender',['MAS','FEM','MIX']);
            $table->integer('challenge_id');
            $table->integer('degree_id');
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
        Schema::drop('rb_team');
    }
}
