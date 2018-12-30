<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReadingListUserTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reading_list_user', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('reading_list_id');
            $table->unsignedInteger('user_id');

            $table->foreign('reading_list_id')->references('id')
              ->on('reading_lists')
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
        Schema::drop('reading_list_user_tables');
    }
}
