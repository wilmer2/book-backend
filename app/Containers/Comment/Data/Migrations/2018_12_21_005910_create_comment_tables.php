<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('body');
            $table->integer('likes')->default(0);
            $table->integer('commentable_id');
            $table->string('commentable_type');

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
        Schema::drop('comments');
    }
}
