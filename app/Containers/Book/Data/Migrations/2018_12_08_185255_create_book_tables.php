<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {

            $table->increments('id');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('books');
    }
}
