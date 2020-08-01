<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
  protected $fillable = ['nome','sku','descricao','status'];
  protected $guarded = ['id', 'created_at', 'update_at'];
  protected $table = 'produtos';

  public function estoque()
  {
      return $this->belongsTo('App\Estoque','id_produto','id'); 
  }
}
