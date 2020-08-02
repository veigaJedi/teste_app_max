<?php

namespace App\Http\Controllers\Api;

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
      $estoque->tipo        = "api";
      $estoque->save();

      return response()->json([
        'message' => 'Produtos adicionados ao estoque',
      ], 201);

    }

    public function baixarProdutos(Request $request)
    {

      $produtoCountQuant = Estoque::select(DB::raw('SUM(quantidade) as quantidade_total'))
        ->where('id_produto','=',$request->id_produto)
        ->groupBy('id_produto')
        ->first();

        if(!$produtoCountQuant){
          return response()->json([
            'message' => 'Produto não disponivel no estoque',
          ], 404);
        }

      $produtoCountBaixas = BaixarProdutos::select(DB::raw('SUM(quantidade) as quantidade_total'))
          ->where('id_produto','=',$request->id_produto)
          ->groupBy('id_produto')
          ->first();

      if($produtoCountBaixas){
        $quantidadeTotal = $produtoCountQuant->quantidade_total - $produtoCountBaixas->quantidade_total;
      }else{
        $quantidadeTotal = $produtoCountQuant->quantidade_total;
      }

      if($request->quantidade > $quantidadeTotal)
      {
        return response()->json([
          'message' => 'Quantidade solicitada maior que disponivel no estoque',
        ], 404);
      }

      $baixaProduto = new BaixarProdutos();
      $baixaProduto->id_produto  = $request->id_produto;
      $baixaProduto->cliente     = $request->cliente;
      $baixaProduto->quantidade  = $request->quantidade;
      $baixaProduto->tipo        = "api";
      $baixaProduto->save();

      return response()->json([
          'message' => 'Baixa de produto efetuada com sucesso',
      ], 201);

    }
}
