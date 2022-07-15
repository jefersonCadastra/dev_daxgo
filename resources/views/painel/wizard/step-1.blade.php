@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('wizard.step.2') }}">
            @csrf
            <div class="row mt-5 bg-light border p-4 mb-3">
                <div class="col-lg-6 offset-lg-3">
                    <h5>Qual a sua meta em</h5>
                    <div class="form-group mb-3">
                        <select name="month" class="form-control">
                            <option>Janeiro</option>
                            <option>Fevereiro</option>
                            <option>Março</option>
                            <option>Abril</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select name="year" class="form-control">
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                    </div>
                    <h5>Valor (R$)</h5>
                    <div class="form-group mb-3">
                        <input name="value" type="number" class="form-control" placeholder="Valor R$" />
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-warning rounded-pill text-uppercase ms-auto">
                    Avançar
                </button>
            </div>
        </form>
    </div>
@endsection
