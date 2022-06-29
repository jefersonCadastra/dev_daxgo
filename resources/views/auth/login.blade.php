@extends('layout/layout')
@section('conteudo')
<div class="row" style="margin-top: 30px;">

    <div class="col-4"></div>

    <div class="col-4">
        <form method="POST" action="/login/authenticate">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="email">Login</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

        </form>
    </div>

    <div class="col-4">

    </div>
</div>
@stop