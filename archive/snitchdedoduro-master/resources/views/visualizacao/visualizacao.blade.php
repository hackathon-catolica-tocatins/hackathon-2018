@extends('template.template')
@section('nome_pagina','')
@section('corpo')



    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br>
            <h1>Vizualização de item </h1>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php($boo = true)
                                @foreach($produto->imagens as $imagem)
                                    <div class="carousel-item @if($boo == true){{'active'}}@endif">
                                        <img class="d-block w-100" src="{{url($imagem->url)}}"
                                             alt="First slide">
                                    </div>
                                    @php($boo = false)
                                        @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                        <div class="form-group col-sm-12">
                            <label for="serie">Identificador do item</label>
                            <h5>{{$produto->identificacao}}</h5>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="data">Data do roubo/furto</label>
                            <h5>{{$produto->dataOcorrido}}</h5>
                        </div>
                    <div class="form-group col-sm-12">
                        <label for="data">Nome</label>
                        <h5>{{$produto->nome}}</h5>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="data">Marca/Modelo</label>
                        <h5>{{$produto->marca}}/{{$produto->modelo}}</h5>
                    </div>
                </div>
            </div>
            <br/>
             <div class="form-group">
                 <label class="cinza" for="descricao">Descrição</label>
                 <h5 id="descricao">{{$produto->descricao}}</h5>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>

@endsection