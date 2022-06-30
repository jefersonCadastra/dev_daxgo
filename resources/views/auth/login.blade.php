@extends('layout.layout')
@section('conteudo')
    <div class="row" style="margin-top: 30px;">

        <div class="col-4"></div>

        <div class="col-4">
            <form method="POST" action="{{ url('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Login</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"
                        name="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

                @error('error')
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ $message }}
                    </div>
                @endif

                </form>
            </div>

            <div class="col-4">

            </div>
        </div>
    @endsection
