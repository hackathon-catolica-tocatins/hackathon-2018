<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class VisualizacaoController extends Controller
{
    public function  index($id){
        $produto = Produto::find($id);
        return view('visualizacao.visualizacao', compact('produto'));
    }

    public function  localizar(){


    }


}
