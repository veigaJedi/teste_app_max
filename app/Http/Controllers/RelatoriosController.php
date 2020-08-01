<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Estoque;
use App\BaixarProdutos;

class RelatoriosController extends Controller
{

    public function __construct()
    {

    }

    public function adicionadosEstoque()
    {
      // $date = date('Y-m-d');
      // dd($date);
      $produtos = Produtos::with('estoque.produtos')
        ->whereDate('created_at', '=', '2020-08-01')
        ->get();
      dd($produtos);
    }

    public function removidosEstoque()
    {

    }
}
