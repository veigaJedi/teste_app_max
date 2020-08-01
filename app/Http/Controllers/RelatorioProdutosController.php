<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Produtos;
use App\BaixarProdutos;
use DB;

class RelatorioProdutosController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

     public function index()
     {

     }

     public function produtosAdicionados()
     {
       $estoque = Estoque::select('produtos.nome',
               DB::raw('SUM(estoque.quantidade) as quantidade_total'))
             ->leftJoin('produtos', 'produtos.id', '=', 'estoque.id_produto')
             ->WhereDate('estoque.created_at','=',date('Y-m-d'))
             ->groupBy('estoque.id_produto','produtos.nome')
             ->orderBy('quantidade_total','DESC')
             ->get();

       return view('relatorios.adicionados',['estoque' => $estoque]);
     }


}
