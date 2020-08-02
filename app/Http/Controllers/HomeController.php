<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\BaixarProdutos;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       // $estoque = Estoque::select('produtos.nome','estoque.id_produto',
       //     DB::raw('SUM(estoque.quantidade) as quantidade_total'))
       //   ->leftJoin('produtos', 'produtos.id', '=', 'estoque.id_produto')
       //   ->groupBy('estoque.id_produto','produtos.nome')
       //   ->orderBy('quantidade_total','DESC')
       //   ->get();
       //
       // if(!empty($estoque)){
       //   foreach($estoque as $value){
       //      $baixaEstoque = BaixarProdutos::select('baixa_estoque.id_produto',
       //         DB::raw('SUM(baixa_estoque.quantidade) as quantidade_total'))
       //       ->leftJoin('produtos', 'produtos.id', '=', 'baixa_estoque.id_produto')
       //       ->where('id_produto', $value->id_produto)
       //       ->groupBy('baixa_estoque.id_produto')
       //       ->orderBy('quantidade_total','DESC')
       //       ->first();
       //
       //      if($baixaEstoque){
       //        $quantidadeTotal = $value->quantidade_total - $baixaEstoque->quantidade_total;
       //      }else{
       //        $quantidadeTotal = $value->quantidade_total;
       //      }
       //
       //      $result[] = [
       //      'nome_prod' => $value->nome,
       //      'quant_total' => $quantidadeTotal,
       //      ];
       //   }
       // }
       $result = false;
       return view('home',['result' => $result]);
    }
}
