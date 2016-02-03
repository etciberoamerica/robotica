<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationUseStaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_relation_use_sta',function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('challenge_id_1');
            $table->integer('stage_id_1');
            $table->integer('challenge_id_2');
            $table->integer('stage_id_2');
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
        Schema::drop('rb_relation_use_sta');
    }
}
