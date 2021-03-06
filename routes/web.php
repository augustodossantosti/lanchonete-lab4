<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to( '/pedidos');
});

Route::resource('ingredientes', 'IngredienteController');
Route::resource('lanches', 'LancheController');
Route::resource('clientes', 'ClienteController');
Route::resource('pedidos', 'PedidoController');
