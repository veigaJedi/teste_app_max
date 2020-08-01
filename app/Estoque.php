<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
  protected $fillable = ['id_produto','quantidade','valor_un','valot_total'];
  protected $guarded = ['id', 'created_at', 'update_at'];
  protected $table = 'estoque';

  public function produtos()
	{
		return $this->belongsTo('App\Produtos', 'id_produto', 'id');
	}

}
