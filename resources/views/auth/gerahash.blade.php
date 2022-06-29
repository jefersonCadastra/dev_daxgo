@extends('layout/layout')
@section('conteudo')
<div class="row" style="margin-top: 30px;">

    <div class="col-4"></div>

    <div class="col-4">
        <form method="POST" action="/login/gerahash">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="hash">Senha</label>
                <input type="text" class="form-control" id="hash" name="hash">
            </div>

            <div class="form-group">
                <label for="hashGerada">Hash</label>
                <input type="text" disabled value="{{ $hashGerada }}" class="form-control" id="hashGerada" name="hashGerada">
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