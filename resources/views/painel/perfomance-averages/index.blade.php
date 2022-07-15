@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('wizard.step', ['step' => 2]) }}">
            @csrf
            <div class="row mt-5 bg-light border p-4 mb-3">
                <div class="col-lg-6 offset-lg-3">
                    <h5>7. Determine a média de performance semana da sua loja</h5>
                    <div class="form-group d-flex justify-content-between">
                        <label for="title">Segunda-feira</label>
                        <div>
                            <input name="weekday[]" type="number" class="form-control" placeholder="%" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="title">Terça-feira</label>
                        <div>
                            <input name="weekday[]" type="number" class="form-control" placeholder="%" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="title">Quarta-feira</label>
                        <div>
                            <input name="weekday[]" type="number" class="form-control" placeholder="%" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="title">Quinta-feira</label>
                        <div>
                            <input name="weekday[]" type="number" class="form-control" placeholder="%" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="title">Sexta-feira</label>
                        <div>
                            <input name="weekday[]" type="number" class="form-control" placeholder="%" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="title">Sábado</label>
                        <div>
                            <input name="weekday[]" type="number" class="form-control" placeholder="%" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="title">Domingo</label>
                        <div>
                            <input name="weekday[]" type="number" class="form-control" placeholder="%" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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

<script>
    setTimeout(() => {
        document.getElementById('btn-remote-record').click()
    }, 4800000);
</script>
