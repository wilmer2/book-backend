<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateViewerTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('viewers', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->ipAddress('ip')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('viewers');
    }
}
