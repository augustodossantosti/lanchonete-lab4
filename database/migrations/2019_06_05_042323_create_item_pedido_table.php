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
        Schema::create('lanche_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->integer('lanche_id')->unsigned();
            $table->integer('quantidade');
            $table->float('subtotal', 8,2);


            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
            $table->foreign('lanche_id')->references('id')->on('lanche')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lanche_pedido');
    }
}
