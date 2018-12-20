<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePageTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->string('image_url')->nullable();
            $table->boolean('public')->default(0);
            $table->binary('text');

            $table->foreign('book_id')->references('id')->on('books')
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
        Schema::drop('pages');
    }
}
