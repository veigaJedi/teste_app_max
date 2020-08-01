<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Estoque;
use App\BaixarProdutos;
use DB;

class RelatoriosController extends Controller
{

    public function __construct()
    {

    }

    public function adicionadosEstoque()
    {
      $estoque = Estoque::select('produtos.nome',
              DB::raw('SUM(estoque.quantidade) as quantidade_total'))
            ->leftJoin('produtos', 'produtos.id', '=', 'estoque.id_produto')
            ->WhereDate('estoque.created_at','=',date('Y-m-d'))
            ->groupBy('estoque.id_produto','produtos.nome')
            ->orderBy('quantidade_total','DESC')
            ->get();

      if(!$estoque) {
          return response()->json([
              'message'   => 'Nenhum Registro Encontrado',
          ], 404);
      }

      return response()->json($estoque, 201);

    }

    public function removidosEstoque()
    {
      
      $baixas = BaixarProdutos::with('produtos.baixas')->get();

      if(!$baixas) {
          return response()->json([
              'message'   => 'Nenhum Registro Encontrado',
          ], 404);
      }

      foreach ($baixas as $value) {
        $baixasResult = ['nome' => $value->produtos->nome, "quantidade" => $value->quantidade];
      }

      return response()->json($baixasResult, 201);
    }
}
