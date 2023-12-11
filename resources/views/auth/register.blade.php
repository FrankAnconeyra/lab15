@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-lg">
            <div class="card-body">
                    <div class="text-center mb-4">
                      <img src="{{ asset('images/emperor.jfif') }}" alt="Minerva Logo" height="150">
                    </div>
                <div class="card-header text-center h4">{{ __('Haz de tu estancia una aventura inolvidable, llena de comodidad y estilo.') }}</div>

                <div class="card-body text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWZBdEB3tn_uMj2Y9-X1h78V-PWW2ANZ_Mng&usqp=CAU" alt="Imagen centrada" class="img-fluid">
                </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label visually-hidden">{{ __('Nombre y Apellidos') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Nombres y Apellidos') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label visually-hidden">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Correo Electrónico') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Contraseña') }}" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label visually-hidden">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Repetir contraseña') }}" required autocomplete="new-password">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('Dia de Nacimiento') }}</label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" name="day" required>
                                        <option value="" disabled selected>{{ __('Dia') }}</option>
                                        @for ($day = 1; $day <= 31; $day++)
                                            <option value="{{ $day }}">{{ $day }}</option>
                                         @endfor
                                    </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="month" required>
                                <option value="" disabled selected>{{ __('Mes') }}</option>
                                @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                    <option value="{{ $month }}">{{ __($month) }}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="col">
                                 <select class="form-select" name="year" required>
                                    <option value="" disabled selected>{{ __('Año') }}</option>
                                    @for ($year = date('Y'); $year >= 1900; $year--)
                                         <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                            </select>
                        </div>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Género') }}</label>
                            <div class="row">
                                <div class="col">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                {{ __('Mujer') }}
                            </label>
                        </div>
                        </div>
                        <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">
                             {{ __('Hombre') }}
                            </label>
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                            <label class="form-check-label" for="terms">
                                {{ __('Acepto los terminos de Minerva') }}
                            </label>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Registrate') }}</button>
                        </div>

                        <hr>

                        <p class="text-center">
                            {{ __('Ya tengo una cuenta?') }}
                            <a href="{{ route('login') }}">{{ __('Acceder') }}</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection