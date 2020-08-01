<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\ProdutosRequest;
use App\Produtos;
use App\Estoque;

class ProdutosController extends Controller
{

    public function __construct(Request $request)
    {

    }

    public function index()
    {
      $produtos = Produtos::orderBy('created_at','asc')->get();

      return response()->json($produtos, 201);
    }

    public function store(Request $request)
    {

      $produto = Produtos::where('sku','=',$request->sku)->first();
      if($produto){
        return response()->json([
          'message' => 'SKU já existe na base de dados',
        ], 404);
      }

      $produto = new Produtos();
      $produto->nome      = $request->nome;
      $produto->sku       = $request->sku;
      $produto->descricao = $request->descricao;
      $produto->status    = $request->status;
      $produto->save();

      return response()->json($produto, 201);
    }

    public function show($id)
    {
      $produto = Produtos::with('estoque.produto')->find($id);

      if(!$produto) {
          return response()->json([
              'message'   => 'Nenhum Registro Encontrado',
          ], 404);
      }

      return response()->json($produto, 201);
    }

    public function update(Request $request, $id)
    {
      $produto = Produtos::findOrFail($id);
      if(!$produto) {
          return response()->json([
              'message'   => 'Nenhum Registro Encontrado',
          ], 404);
      }

      $produto->nome      = $request->nome;
      $produto->sku       = $request->sku;
      $produto->descricao = $request->descricao;
      $produto->status    = $request->status;
      $produto->update();

      return response()->json($produto, 201);
    }

    public function destroy($id)
    {
      $produto = Produtos::findOrFail($id);
      $produto->delete();
      return response()->json(['message' => "Produto Excluido com Sucesso",201]);
    }

}
