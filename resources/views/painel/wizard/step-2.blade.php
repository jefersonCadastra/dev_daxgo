@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('wizard.step', ['step' => 3]) }}">
        <div class="row mt-5 bg-light border p-4 mb-3">
            <div class="col-lg-6 offset-lg-3">
                <h5>Qual a sua meta de conversão (%)?</h5>
                <div class="form-group mb-3">
                    <input name="meta" type="number" class="form-control" placeholder="Meta de conversão(%)" />
                </div>
                <h5>Qual a sua meta de ticket médio (R$)?</h5>
                <div class="form-group mb-3">
                    <input name="ticket" type="number" class="form-control" placeholder="Meta de ticket médio (R$)" />
                </div>
                <h5>Qual a sua meta de aprovação (%)?</h5>
                <div class="form-group mb-3">
                    <input name="aprovacao" type="number" class="form-control" placeholder="Meta de aprovação (%)" />
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-outline-warning rounded-pill text-uppercase me-auto" href="{{ route('wizard.step', ['step' => 1]) }}">
                Voltar
            </a>
            <button type="submit" class="btn btn-outline-warning rounded-pill text-uppercase ms-auto">
                Avançar
            </button>
        </div>
    </form>
</div>
@endsection