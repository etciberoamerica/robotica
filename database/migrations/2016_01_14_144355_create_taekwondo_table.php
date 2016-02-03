<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaekwondoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_challenge_taekwondo',function(Blueprint $table){
            $table->increments('id');
            $table->integer('team_id_win')->nullable();
            $table->integer('team_id_1')->nullable();
            $table->integer('score_team_1')->nullable();
            $table->string('drop_team_1')->nullable();
            $table->integer('firm_team_1')->nullable();
            $table->integer('team_id_2')->nullable();
            $table->integer('score_team_2')->nullable();
            $table->string('drop_team_2')->nullable();
            $table->integer('firm_team_2')->nullable();
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
        Schema::drop('rb_challenge_taekwondo');
    }
}
