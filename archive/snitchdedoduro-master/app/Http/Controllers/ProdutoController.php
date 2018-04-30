<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Imagem;
use App\Produto;
use App\User;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('produto.cadastro');
    }

    public function salvar(Request $request)
    {

        $dados = $request->all();
        $produto = new Produto();
        $produto->nome = $dados['nome'];
        $produto->valor = $dados['valor'];
        $produto->marca = $dados['marca'];
        $produto->modelo = $dados['modelo'];
        $produto->categoria = $dados['categoria'];
        $produto->descricao = $dados['descricao'];
        $produto->identificacao = $dados['identificacao'];
        $produto->ocorrido = $dados['ocorrido'];
        $produto->dataOcorrido = $dados['dataOcorrido'];

        if ($request->hasFile('boletimOcorrencia')) {
            $boletim = $request->file('boletimOcorrencia');
            $produto->boletimOcorrencia = $this->upload($boletim);
        }

        if ($request->hasFile('notaFiscal')) {
            $notaFiscal = $request->file('notaFiscal');
            $produto->notaFiscal =  $this->upload($notaFiscal);;
        }

        $produto->save();

        if ($request->hasFile('imagens')) {
            $imagens[] = $request->file('imagens');
            foreach ($imagens[0] as $imagem) {
                $printTela = new Imagem();
                $diretorio = "imgs/anexos/";
                $extensao = $imagem->clientExtension();
                $nome = "chamado_user_" .date("dd_mm_yyyy_hh_mm_ss").rand ( 1 , 9999999). "." . $extensao;
                $imagem->move($diretorio, $nome);
                $url = $diretorio . $nome;

                $printTela->idproduto = $produto->id;
                $printTela->url = $url;
                $printTela->nome = $nome;
                $printTela->save();
            }
        }
        dd($produto);
    }

    public function upload($arquivo){
        $diretorio = "imgs/anexos/";
        $extensao = $arquivo->clientExtension();
        $nome = "chamado_user_" .date("dd_mm_yyyy_hh_mm_ss").rand ( 1 , 9999999). "." . $extensao;
        $arquivo->move($diretorio, $nome);
        return $url = $diretorio . $nome;
    }

    public function buscar(Request $request){
        $dados = $request->all();
        $categorias = Categoria::all();
        $produtos = Produto::where("identificacao", $dados['termo'])
            ->where("categoria", $dados['categoria'])->get();
        return view('Listagem.listagem', compact('produtos', 'categorias'));
    }
}
