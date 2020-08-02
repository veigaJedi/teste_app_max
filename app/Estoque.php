<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Estoque extends Model
{
  protected $fillable = ['id_produto','quantidade','valor_un','valot_total'];
  protected $guarded = ['id', 'created_at', 'update_at'];
  protected $table = 'estoque';

  public function produtos()
	{
		return $this->belongsTo('App\Produtos', 'id_produto', 'id');
	}

  public function relatorioProdutosAdicionados($dtNow)
  {
    $estoque = Estoque::select('produtos.nome','estoque.tipo',
            DB::raw('SUM(estoque.quantidade) as quantidade_total'))
          ->leftJoin('produtos', 'produtos.id', '=', 'estoque.id_produto')
          ->WhereDate('estoque.created_at','=', $dtNow)
          ->groupBy('estoque.id_produto','estoque.tipo','produtos.nome')
          ->orderBy('quantidade_total','DESC')
          ->paginate(10);

    return  $estoque;
  }

}
