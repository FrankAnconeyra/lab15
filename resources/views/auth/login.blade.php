@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="row">
                    
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                     <img src="{{ asset('images/emperor.jfif') }}" alt="Minerva Logo" height="150">
                    </div>
                <div class="card-header text-center h4">{{ __('Descubre un refugio de serenidad y hospitalidad en el corazón de tu ciudad.') }}</div>
              
                <div class="card-body text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSObZCXRLn2jAQvtEhHW3lR_gkFy53M4Kghkv8yhPZyLg&s" alt="Imagen centrada" class="img-fluid">
                </div>
                   
        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Ingresar') }}</button>
                        </div>

                        <div class="mb-3 text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña') }}
                                </a>
                            @endif
                        </div>
                        <div class="mb-3 text-center">
                             <p>{{ __("No tienes una cuenta") }} <a href="{{ route('register') }}">{{ __('Registrate en Minerva') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
