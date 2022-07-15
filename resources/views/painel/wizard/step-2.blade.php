@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Definição de meta</li>
        </ol>
    </nav>
    <form method="post" action="{{ route('wizard.step.3') }}">
        <div class="row boxContent">
            <div class="col-lg-6">
                <h2 class="mb-4">Falta pouco...</h2>
                <div class="form-group mb-3">
                    <label class="mb-2">Qual a sua meta de conversão (%)?</label>
                    <input name="conversion" step="any" type="number" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2">Qual a sua meta de ticket médio (R$)?</label>
                    <input name="ticket" step="any" type="number" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2">Qual a sua meta de aprovação (%)?</label>
                    <input name="approval" step="any" type="number" class="form-control">
                </div>
                <a class="btn back" href="{{ route('wizard.step.1') }}">Voltar</a>

                <button type="submit" class="btn next">Avançar</button>
            </div>

            <div class="col-lg-6">
                <img src="{{ asset('img/card.svg') }}">
            </div>


        </div>
    </form>
</div>
@endsection