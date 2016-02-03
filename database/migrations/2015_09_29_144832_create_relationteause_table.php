<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationteauseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_relation_te_us',function(Blueprint $table){
            $table->increments('id');
            $table->integer('team_id');
            $table->integer('user_coach_id');
            $table->integer('user_coach_aux_id');
            $table->integer('user_coordinador_id');
            $table->integer('user_cap_id');
            $table->integer('user_int2_id');
            $table->integer('user_int3_id');
            $table->integer('user_int4_id')->nullable();
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
        Schema::drop('rb_relation_te_us');
    }
}
