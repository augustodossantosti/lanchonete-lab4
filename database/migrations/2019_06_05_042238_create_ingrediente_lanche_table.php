<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredienteLancheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingrediente_lanche', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('id_lanche')->unsigned();
            $table->integer('id_ingrediente')->unsigned();
            $table->integer('quantidade');            


            $table->foreign('id_lanche')->references('id')->on('lanche')->onDelete('cascade');
            $table->foreign('id_ingrediente')->references('id')->on('ingrediente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingrediente_lanche');
    }
}
