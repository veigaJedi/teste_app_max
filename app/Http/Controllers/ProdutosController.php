<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;

class ProdutosController extends Controller
{
    /**
     *
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Lista de Produtos
     *
     */
     public function index()
     {
       $produtos = Produtos::orderBy('updated_at','asc')->paginate('10');
       return view('produtos.index',['produtos' => $produtos]);
     }

     public function create()
     {
       return view('produtos.create');
     }

     public function store(Request $request)
     {
       $produto = Produtos::where('sku','=',$request->sku)->first();
       if($produto){
          return redirect()->route('produtos.create')->withStatus(__('Sku ja existe.'));
       }

       $produto = new Produtos();
       $produto->nome      = $request->nome;
       $produto->sku       = $request->sku;
       $produto->descricao = $request->descricao;
       $produto->status    = $request->status;
       $produto->save();

       return redirect()->route('produtos.index')->withStatus(__('Cadastrado com sucesso.'));
     }

     public function edit($id)
     {
       $produto = Produtos::findOrFail($id);
       return view('produtos.edit',compact('produto'));
     }

     public function update(Request $request, $id)
     {
       $produto = Produtos::findOrFail($id);
       $produto->nome      = $request->nome;
       $produto->sku       = $request->sku;
       $produto->descricao = $request->descricao;
       $produto->status    = $request->status;
       $produto->update();

       return redirect()->route('produtos.index')->withStatus(__('Atualizado com sucesso.'));
     }

     public function destroy($id)
     {
       $produto = Produtos::findOrFail($id);
       $produto->delete();
       return redirect()->route('produtos.index')->withStatus(__('Excluido com sucesso.'));
     }

}
