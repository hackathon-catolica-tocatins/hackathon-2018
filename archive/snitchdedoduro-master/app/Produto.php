<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    public function imagens(){
        return $this->hasMany('App\Imagem', "idproduto");
    }
}
