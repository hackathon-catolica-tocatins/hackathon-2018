<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('listagem.index');
});

Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@logar']);
Route::get('/login/sair', ['as' => 'login.sair', 'uses' => 'LoginController@sair']);

Route::get('/usuario/cadastro', ['as' => 'usuario.index', 'uses' => 'UsuarioController@index']);
Route::post('/usuario/cadastro', ['as' => 'usuario.salvar', 'uses' => 'UsuarioController@salvar']);


Route::get('/item/categoria', ['as' => 'categoria.index', 'uses' => 'CategoriaController@index']);
Route::post('/item/categoria', ['as' => 'categoria.salvar', 'uses' => 'CategoriaController@salvar']);
Route::post('/item/search', ['as' => 'item.buscar', 'uses' => 'ProdutoController@buscar']);

Route::get('/item/visualizacao/{id}', ['as' => 'visualizacao.index', 'uses' => 'VisualizacaoController@index']);

Route::get('/item/listagem', ['as' => 'listagem.index', 'uses' => 'ListagemController@index']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/item/cadastro', ['as' => 'cadastro.index', 'uses' => 'ProdutoController@index']);
    Route::post('/item/cadastro', ['as' => 'cadastro.salvar', 'uses' => 'ProdutoController@salvar']);
});
