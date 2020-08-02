<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estoque;
use App\Produtos;
use App\BaixarProdutos;
use DB;
use Carbon\Carbon;

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

       $dtNow = date('y-m-d');
       $relatorio = new Estoque();
       $result = $relatorio->relatorioProdutosAdicionados($dtNow);

       return view('relatorios.adicionados',['relatorio' => $result]);

     }

     public function buscarProdutosAdicionados(Request $request)
     {

       $dtNow = Carbon::createFromFormat('d/m/Y', $request->dt_busca);
       $relatorio = new Estoque();
       $result = $relatorio->relatorioProdutosAdicionados($dtNow);

       return view('relatorios.busca',['relatorio' => $result, 'dataAtual' => $request->dt_busca]);

     }

     public function baixaProdutos()
     {

       $dtNow = date('y-m-d');
       $relatorio = new Estoque();
       $result = $relatorio->relatorioProdutosAdicionados($dtNow);

       return view('relatorios.adicionados',['relatorio' => $result]);

     }

}
