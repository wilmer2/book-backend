<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikeTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('likeable_id');
            $table->string('likeable_type');

            $table->foreign('user_id')->references('id')
              ->on('users')
              ->onDelete('cascade');
              
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('likes');
    }
}
