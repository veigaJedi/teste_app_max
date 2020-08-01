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


Route::group(array(), function()
{
  Route::get('/', function () {
      return response()->json(['message' => 'Produtos API', 'status' => 'Conectado']);;
  });
  Route::resource('produtos', 'ProdutosController');
  Route::post('adicionar-produtos', ['as' => 'adicionar-produtos', 'uses' => 'EstoqueController@adicionarProdutos']);
  Route::post('baixar-produtos ', ['as' => 'baixar-produtos', 'uses' => 'EstoqueController@baixarProdutos']);
  Route::get('relatorio-produtos-adicionados',
    [
      'as' => 'relatorio-produtos-adicionados',
      'uses' => 'RelatoriosController@adicionadosEstoque'
    ]
  );

});

Route::get('/', function () {
    return redirect('api');
});
