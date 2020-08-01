<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([], function()
{

  Route::post('adicionar-produtos', ['as' => 'adicionar-produtos', 'uses' => 'Api\EstoqueController@adicionarProdutos']);

  Route::post('baixar-produtos ', ['as' => 'baixar-produtos', 'uses' => 'Api\EstoqueController@baixarProdutos']);

});
