<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookReadingListTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('book_reading_list', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('reading_list_id');

            $table->foreign('book_id')->references('id')
              ->on('books')
              ->onDelete('cascade');

            $table->foreign('reading_list_id')->references('id')
              ->on('reading_lists')
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
        Schema::drop('book_reading_list');
    }
}
