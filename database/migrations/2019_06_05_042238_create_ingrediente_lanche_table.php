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
            $table->integer('lanche_id')->unsigned();
            $table->integer('ingrediente_id')->unsigned();
            $table->integer('quantidade');


            $table->foreign('lanche_id')->references('id')->on('lanche')->onDelete('cascade');
            $table->foreign('ingrediente_id')->references('id')->on('ingrediente')->onDelete('cascade');
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
