<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = "imagem";

    public function produto(){
        return $this->belongsTo('App\Produto','idproduto');
    }
}
