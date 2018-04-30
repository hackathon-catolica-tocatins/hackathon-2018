@extends('template.template')
@section('nome_pagina','')
@section('corpo')
    <div class="row">
        <div class="form-group col-sm-3">
        </div>
        <div class="form-group col-sm-6">
            <br>
            <h3>Criar conta no Snitch</h3>
            <br>
            <form action="{{route('usuario.salvar')}}" method="post">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="name">Nome</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nome">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email">Nome</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="Sobrenome">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="password">Senha</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="password2">Repita a senha</label>
                        <input type="password" name="password2" class="form-control" id="password2"
                               placeholder="Repita a senha">
                    </div>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <div class="form-group col-sm-3">
        </div>
    </div>
@endsection