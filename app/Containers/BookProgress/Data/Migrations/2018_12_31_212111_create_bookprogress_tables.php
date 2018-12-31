<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookprogressTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('book_progresses', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('user_id');
            $table->integer('read_pages')->default(0);
            $table->float('percentage')->default(0);

            $table->foreign('book_id')->references('id')
              ->on('books')
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
        Schema::drop('bookprogresses');
    }
}
