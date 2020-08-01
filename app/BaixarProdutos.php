<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaixarProdutos extends Model
{
  protected $fillable = ['id_produto','cliente','quantidade'];
  protected $guarded = ['id', 'created_at', 'update_at'];
  protected $table = 'baixa_estoque';

}
