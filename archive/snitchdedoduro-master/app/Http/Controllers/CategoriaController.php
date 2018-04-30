<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('categoria.categoria');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $categoria = new Categoria();
        $categoria->nome = $dados['nome'];


        $categoria->save();
    }
}
