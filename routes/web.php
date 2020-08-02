<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('produtos', ['as' => 'produtos.index', 'uses' => 'ProdutosController@index']);

  Route::get('produtos/create', ['as' => 'produtos.create', 'uses' => 'ProdutosController@create']);

  Route::post('produtos/store', ['as' => 'produtos.store', 'uses' => 'ProdutosController@store']);

  Route::get('produtos/edit/{id}', ['as' => 'produtos.edit', 'uses' => 'ProdutosController@edit']);

  Route::post('produtos/update/{id}', ['as' => 'produtos.update', 'uses' => 'ProdutosController@update']);

  Route::delete('produtos/destroy/{id}', ['as' => 'produtos.destroy', 'uses' => 'ProdutosController@destroy']);

  Route::get('adicionar-produto', ['as' => 'adicionar-produto.create', 'uses' => 'EstoqueProdutosController@create']);

  Route::get('baixa-produto', ['as' => 'baixa-produto', 'uses' => 'EstoqueProdutosController@createBaixa']);

  Route::post('adicionar-produtos', ['as' => 'adicionar-produtos', 'uses' => 'EstoqueProdutosController@adicionarProdutos']);

  Route::post('baixar-produtos', ['as' => 'baixar-produtos', 'uses' => 'EstoqueProdutosController@baixarProdutos']);

  Route::get('rel-produtos-adicionados', ['as' => 'rel-produtos-adicionados', 'uses' => 'RelatorioProdutosController@produtosAdicionados']);
  Route::get('rel-produtos-baixa', ['as' => 'rel-produtos-baixa', 'uses' => 'RelatorioProdutosController@baixaProdutos']);

  Route::post('rel-busca-adicionados', ['as' => 'rel-busca-adicionados', 'uses' => 'RelatorioProdutosController@buscarProdutosAdicionados']);

});
