@extends('template.template')
@section('nome_pagina','')
@section('corpo')
    <div class="row">
        <div class="form-group col-sm-2">
        </div>
        <div class="form-group col-sm-8">

            <h3>Registro de Categoria de Produto</h3>
            <form action="{{route('categoria.salvar')}}" method="post">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="nome">Nome da Categoria</label>
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da Categoria">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" >
                    Cadastrar Categoria
                </button>

                {{csrf_field()}}
            </form>
        </div>
        <div class="form-group col-sm-2">
        </div>
@endsection