<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeBlockriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_challenge_blockrise',function(Blueprint $table){
            $table->increments('id');
            $table->integer('combat_id');
            $table->integer('team_id_win')->default(NULL);
            $table->integer('team_id_1')->nullable();;
            $table->string('time_team_1')->nullable();
            $table->integer('zon_pun_roj_1')->nullable();
            $table->integer('num_api_roj_1')->nullable();
            $table->integer('zon_pun_ver_1')->nullable();
            $table->integer('num_api_ver_1')->nullable();
            $table->integer('zon_pun_azu_1')->nullable();
            $table->integer('num_api_azu_1')->nullable();
            $table->integer('scort_team_1')->nullable();
            $table->integer('firm_team_1')->nullable();


            $table->integer('team_id_2')->nullable();
            $table->string('time_team_2')->nullable();
            $table->integer('zon_pun_roj_2')->nullable();
            $table->integer('num_api_roj_2')->nullable();
            $table->integer('zon_pun_ver_2')->nullable();
            $table->integer('num_api_ver_2')->nullable();
            $table->integer('zon_pun_azu_2')->nullable();
            $table->integer('num_api_azu_2')->nullable();
            $table->integer('scort_team_2')->nullable();
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
        Schema::drop('rb_challenge_blockrise');
    }
}
