<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class ListagemController extends Controller
{

    public function  index(){
        $categorias = Categoria::all();
        return view('Listagem.listagem',compact('categorias'));
    }


}
