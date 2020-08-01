<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Produtos;
use App\BaixarProdutos;
use DB;

class EstoqueProdutosController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

     public function index()
     {

     }

     public function create()
     {
       $produtos = Produtos::orderBy('updated_at','asc')->get();
       return view('estoque.adicionar',['produtos' => $produtos]);
     }

     public function formatarValores($valor)
     {
       $source = array('.', ',');
       $replace = array('', '.');
       $valorFormat = str_replace($source, $replace, $valor);
       return $valorFormat;
     }

     public function adicionarProdutos(Request $request)
     {
       $valor = $this->formatarValores($request->valor_un);
       $valorTotal = $valor * $request->quantidade;

       $estoque = new Estoque();
       $estoque->id_produto  = $request->produto;
       $estoque->quantidade  = $request->quantidade;
       $estoque->valor_un    = $valor;
       $estoque->valor_total = $valorTotal;
       $estoque->save();

       return redirect()->route('adicionar-produto.create')->withStatus(__('Cadastrado com sucesso.'));
     }

     public function createBaixa()
     {
       $produtos = Produtos::orderBy('updated_at','asc')->get();
       return view('estoque.baixa',['produtos' => $produtos]);
     }

     public function baixarProdutos(Request $request)
     {
       $produtoCountQuant = Estoque::select(DB::raw('SUM(quantidade) as quantidade_total'))
         ->where('id_produto','=',$request->produto)
         ->groupBy('id_produto','quantidade')
         ->first();

       if(!$produtoCountQuant){
         return redirect()->route('baixa-produto')->withStatus(__('Produto nao disponivel no estoque'));
       }

       if($request->quantidade > $produtoCountQuant->quantidade_total)
       {
         return redirect()->route('baixa-produto')->withStatus(__('Quantidade solicidade maior que disponivel no estoque.'));
       }

       $baixaProduto = new BaixarProdutos();
       $baixaProduto->id_produto  = $request->produto;
       $baixaProduto->cliente     = $request->cliente;
       $baixaProduto->quantidade  = $request->quantidade;
       $baixaProduto->save();

       return redirect()->route('baixa-produto')->withStatus(__('Baixa solicitada com sucesso'));
     }


}
