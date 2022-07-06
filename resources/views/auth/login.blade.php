@extends('layouts.app')

@section('content')
<div class="center-login">
    <main class="form-signin w-100 m-auto text-center">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="login" src="{{ asset('img/logo.svg') }}" width="150">
            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="floatingInput">Digite seu email</label>
            </div>

            <div class="form-floating">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="floatingPassword">Digite sua senha</label>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>
</div>
@endsection
