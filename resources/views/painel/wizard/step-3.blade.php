@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 bg-light border p-4 mb-3">
            <div class="col-lg-6 offset-lg-3">
                <h2>Wizard passo 3</h2>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-outline-warning rounded-pill text-uppercase me-auto" href="{{ route('wizard.step.2') }}">
                Voltar
            </a>
            <a class="btn btn-outline-warning rounded-pill text-uppercase ms-auto" href="{{ route('wizard.step.4') }}">
                Avançar
            </a>
        </div>
    </div>
@endsection
