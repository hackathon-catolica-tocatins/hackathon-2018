@extends('template.template')
@section('nome_pagina','Login')
@section('corpo')
    <div class="row text-center">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form class="form-signin" method="post" action="{{route('login')}}">
                <h1>Bem Vindo ao Snitch </h1>
                </br>
                <h2 class="h3 mb-3 font-weight-normal">Login</h2>
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Lembrar-me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
                {{csrf_field()}}
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection