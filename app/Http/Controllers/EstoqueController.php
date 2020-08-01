<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Estoque;
use App\BaixarProdutos;
use DB;

class EstoqueController extends Controller
{
    public function __construct()
    {

    }

    public function adicionarProdutos(Request $request)
    {
      $valorTotal = $request->valor_un * $request->quantidade;

      $estoque = new Estoque();
      $estoque->id_produto  = $request->id_produto;
      $estoque->quantidade  = $request->quantidade;
      $estoque->valor_un    = $request->valor_un;
      $estoque->valor_total = $valorTotal;
      $estoque->save();

      return response()->json([
        'message' => 'Produtos adicionados ao estoque',
      ], 201);

    }

    public function baixarProdutos(Request $request)
    {

      $produtoCountQuant = Estoque::select(DB::raw('SUM(quantidade) as quantidade_total'))
        ->where('id_produto','=',$request->id_produto)
        ->groupBy('id_produto','quantidade')
        ->first();

      if($request->quantidade > $produtoCountQuant->quantidade_total)
      {
        return response()->json([
          'message' => 'Estoque não possui a quantidade desejada',
        ], 404);
      }

      $baixaProduto = new BaixarProdutos();
      $baixaProduto->id_produto  = $request->id_produto;
      $baixaProduto->cliente     = $request->cliente;
      $baixaProduto->quantidade  = $request->quantidade;
      $baixaProduto->save();

      return response()->json([
          'message' => 'Baixa de produto efetuada com sucesso',
      ], 201);

    }
}
