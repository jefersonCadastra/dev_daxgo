@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 bg-light border p-4 mb-3">
            <div class="col-lg-6 offset-lg-3">
                <h2>Wizard passo 4</h2>
                <form action="{{ route('wizard.step.4') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="file">Arquivo CSV</label>
                        <input name="file" type="file" class="form-control-file" />
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-outline-warning rounded-pill text-uppercase me-auto" href="{{ route('wizard.step.3') }}">
                Voltar
            </a>
            <a class="btn btn-outline-warning rounded-pill text-uppercase ms-auto" href="{{ route('wizard.step.5') }}">
                Avançar
            </a>
        </div>
    </div>
@endsection
