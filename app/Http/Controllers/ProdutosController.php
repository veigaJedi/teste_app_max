<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Estoque;

class ProdutosController extends Controller
{
    /**
     *
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Lista de Produtos
     *
     */
     public function index()
     {
         $produtos = Produtos::orderBy('created_at','asc')->get();
         return response()->json($produtos, 201);
     }

     public function store(Request $request)
     {
         $produto = new Produtos();
         $produto->nome      = $request->nome;
         $produto->sku       = uniqid();
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
      $produto->sku       = uniqid();
      $produto->descricao = $request->descricao;
      $produto->status    = $request->status;
      $produto->save();

      return response()->json($produto, 201);
    }

    public function destroy($id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->delete();
        return response()->json(['message' => "Produto Excluido com Sucesso",201]);
    }

}
