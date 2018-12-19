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
            $table->string('name');
            $table->string('description');
            $table->string('image_url')->nullable();
            $table->integer('view');
            $table->enum('copyright', ['No Especificado', 'Todos los Derechos Reservados',
              'Dominio de Todos', 'Creative Commons (CC) Attribution', 'Share-Alike'
            ]);

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');

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
