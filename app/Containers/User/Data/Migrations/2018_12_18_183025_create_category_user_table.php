<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryUserTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('category_user', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
              ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('category_user');
    }
}
