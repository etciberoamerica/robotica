<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rb_institution', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('user_id');
            $table->boolean('mas');
            $table->boolean('fem');
            $table->boolean('mix');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
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
        Schema::drop('rb_institution');
    }
}
