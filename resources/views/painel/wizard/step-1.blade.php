@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Definição de meta</li>
        </ol>
    </nav>
    <form method="post" action="{{ route('wizard.step', ['step' => 2]) }}">
        <div class="row boxContent align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4">Qual a sua meta em</h2>
                <div class="form-group mb-3">
                    <label class="mb-2">Selecione o mês</label>
                    <select name="month" class="form-control month">
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>

                    <select name="year" class="form-control year">
                        <option selected>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="mb-2">Qual a sua meta de faturamento (R$)?</label>
                    <input name="invoicing" step="any" type="number" class="form-control investment" />
                </div>

                <button type="submit" class="btn next">Avançar</button>
            </div>

            <div class="col-lg-6">
                <img src="{{ asset('img/people.svg') }}">
            </div>
        </div>

    </form>

</div>
@endsection