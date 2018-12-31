<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMainColumnToReadingListsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reading_lists', function (Blueprint $table) {

            $table->boolean('main')->default(0);
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('reading_lists', function (Blueprint $table) {
            $table->dropColumn('main');
        });
    }
}
