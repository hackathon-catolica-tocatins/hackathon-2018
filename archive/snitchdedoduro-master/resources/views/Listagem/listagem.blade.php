@extends('template.template')
@section('nome_pagina','')
@section('corpo')
    <div class="row">
        <div class="form-group col-sm-2">
        </div>

        <div class="form-group col-sm-8">
            <br/>
            <br/>
            <br/>
            <h2>Verificar itens</h2>
            <form class="form-inline-center my-4 my-lg-4" method="post" action="{{route('item.buscar')}}">
                <div class="row">
                    <div class="form-group col-sm-7">
                    <input class="form-control mr-sm-2" name="termo" type="search" placeholder="Search"
                           aria-label="Search">
                    </div>
                    <div class="form-group col-sm-3">
                        <select class="form-control" name="categoria" id="exampleFormControlSelect1">
                            @foreach($categorias as $categoria)
                                <option>{{$categoria->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <button class="btn btn-outline-success " type="submit">Buscar itens</button>
                    </div>
                </div>
                {{csrf_field()}}
            </form>
            <br>
            <h3 class="text-center">Resultados da busca</h3>
            <br>
            @if(isset($produtos))
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Numero de identificação</th>

                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <th scope="col"><a href="{{route('visualizacao.index', $produto->id)}}">{{$produto->nome}}</a></th>
                        <td>{{$produto->modelo}}</td>
                        <td>{{$produto->identificacao}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                @else
                <h5 class="text-center">Nenhum resultado...</h5>
                @endif
        </div>
        <hr>
        <div class="form-group col-sm-2">
        </div>
    </div>
@endsection