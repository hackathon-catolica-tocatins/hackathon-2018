<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function logar(Request $request){
        $dados= $request->all();
        if (Auth::attempt(['email' => $dados['email'], 'password' => $dados['password']])){
//            if (!User::usuarioLogado()->isAtivo()){
//                return redirect()->route('site.login')->withErrors(['Erro! Usuário desativado!', 'Contate o suporte caso queira reativar a conta!']);
//            }
//            if(User::usuarioLogado()->isTrocarSenha()){
//                return redirect()->route('user.alterarsenha');
//            }else{
//
//            }
            return redirect()->route('listagem.index');
        }
        return redirect()->route('cadastro.index');
    }
    public function sair(Request $request){
        Auth::logout();
        return redirect()->route('listagem.index');
    }
}
