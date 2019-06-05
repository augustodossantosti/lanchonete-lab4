<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pedido')->unsigned();
            $table->integer('id_lanche')->unsigned();
            $table->integer('quantidade');
            $table->float('sutotal', 8,2);


            $table->foreign('id_pedido')->references('id')->on('pedido')->onDelete('cascade');
            $table->foreign('id_lanche')->references('id')->on('lanche')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_pedido');
    }
}
