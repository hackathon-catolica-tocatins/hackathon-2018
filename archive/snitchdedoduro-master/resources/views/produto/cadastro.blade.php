@extends('template.template')
@section('nome_pagina','')
@section('corpo')
    <div class="row">
        <div class="form-group col-sm-2">
        </div>
        <div class="form-group col-sm-8">
            <br>
            <h3>Registre um furto ou roubo</h3><br>
            <form action="{{route('cadastro.salvar')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do produto">
                </div>
                <div class="form-group col-sm-3">
                    <label for="valor">Valor do item</label>
                    <input type="text" name="valor" class="form-control" id="valor" placeholder="Valor do produto">
                </div>
                <div class="form-group col-sm-3">
                    <label for="marca">Marca do item</label>
                    <input type="text" name="marca" class="form-control" id="marca" placeholder="Marca do item">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <option>Veiculo</option>
                        <option>Smartphone</option>
                        <option>Computadores</option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label for="identificacao">Identificador do item</label>
                    <input type="text" name="identificacao" class="form-control" id="identificacao" placeholder="Identificador do item">
                </div>
                <div class="form-group col-sm-4">
                    <label for="nota">Nota fiscal</label>
                    <input type="file" name="notaFiscal" class="form-control-file btn btn-light" id="nota">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="modelo">Modelo do item</label>
                    <input type="da" name="modelo" class="form-control" id="modelo" placeholder="Identificador do item">
                </div>
                <div class="form-group col-sm-4">
                    <label for="data">Data do ocorrido</label>
                    <input type="date" name="dataOcorrido" class="form-control" id="data" placeholder="Identificador do item">
                </div>
                <div class="form-group col-sm-4">

                    <label for="tipo">Ocorrido</label>
                    <div id="tipo">
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" name="ocorrido" id="exampleRadios1"
                                   value="furto" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Furto
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ocorrido" id="exampleRadios2"
                                   value="furto">
                            <label class="form-check-label" for="exampleRadios2">
                                Roubo
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="nota">Boletim de ocorrência</label>
                    <input type="file" name="boletimOcorrencia" class="form-control-file btn btn-light" id="nota">
                </div>
                <div class="form-group col-sm-6">
                    <label for="nota">Imagens do item furtado</label>
                    <input type="file" name="imagens[]" multiple class="form-control-file btn btn-light" id="nota">
                </div>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Concluir</button>
        </form>
    </div>
    <div class="form-group col-sm-2">
    </div></div>
@endsection