<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Produtos;

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


}
