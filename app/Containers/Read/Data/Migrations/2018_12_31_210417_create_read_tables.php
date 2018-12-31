<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReadTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reads', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->unsignedInteger('user_id');

            $table->foreign('page_id')->references('id')
              ->on('pages')
              ->onDelete('cascade');

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
        Schema::drop('reads');
    }
}
