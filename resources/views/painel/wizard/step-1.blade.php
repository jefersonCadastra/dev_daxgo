@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 bg-light border p-4 mb-3">
            <div class="col-lg-6 offset-lg-3">
                <form>
                    <h5>Qual a sua meta em</h5>
                    <div class="form-group mb-3">
                        <select class="form-control">
                            <option value="">Janeiro</option>
                            <option value="">Fevereiro</option>
                            <option value="">Março</option>
                            <option value="">Abril</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select class="form-control">
                            <option value="">2022</option>
                            <option value="">2023</option>
                            <option value="">2024</option>
                            <option value="">2025</option>
                        </select>
                    </div>
                    <h5>Valor (R$)</h5>
                    <div class="form-group mb-3">
                        <input type="number" class="form-control" placeholder="Valor R$" />
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a class="btn btn-outline-warning rounded-pill text-uppercase ms-auto" href="{{ route('wizard.step', ['step' => 2]) }}">
                Avançar
            </a>
        </div>
    </div>
@endsection
