<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function  index(){
        return view('usuario.cadastro');
    }

    public function  salvar(Request $request){
        $dados = $request->all();

        $user= new User();
        $user->name = $dados['name'];
        $user->password = bcrypt($dados['password']);
        $user->sobrenome = $dados['sobrenome'];
        $user->cpf = $dados['cpf'];
        $user->endereco = $dados['endereco'];
        $user->email = $dados['email'];

        $user->save();

        return view('Listagem.listagem');
    }
}
