<!DOCTYPE html>
<html  dir="ltr" lang="es" xml:lang="es">
<head>
    <title> Minerva</title>
    <link rel="icon" href="https://seeklogo.com/images/C/cafe-minerva-nuevo-fondo-claro-logo-2AE9A20374-seeklogo.com.png" />

@extends('layouts.app')

@section('content')
<main>
<style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .album {
            padding-top: 3rem;
            padding-bottom: 3rem;
            background-color: #f8f9fa;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 1rem;
        }

        .col-auto {
            padding: 0;
            margin: 0;
        }

        form {
            margin: 0 auto;
            max-width: 600px;
        }
    </style>

    <div class="album">
    <div class="album py-5 bg-light">
        <div class="container">
            
            <form action="{{ route('subirFoto') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <label for="staticEmail2">Subir Un Hotel a Minerva</label>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Hotel</label>
                    <input type="text" class="form-control" name="hotel" placeholder="Agregue el  hotel" value="{{ old('hotel') }}">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="Agregue una descripción">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">Provincia</label>
                    <input type="text" class="form-control" name="provincia" placeholder="Agregue la provincia" value="{{ old('provincia') }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">Distrito</label>
                    <input type="text" class="form-control" name="distrito" placeholder="Agregue el distrito" value="{{ old('distrito') }}">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Agregue la dirección">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Cuartos Disponibles</label>
                    <input type="number" class="form-control" name="cuartos_disponibles" placeholder="Número de cuartos disponibles">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">Tipo de Habitación</label>
                    <input type="text" class="form-control" name="tipo_habitacion" placeholder="Agregue el tipo de habitación">
                </div>
                    <label for="exampleFormControlInput5" class="form-label">Precio por Noche</label>
                    <input type="number" class="form-control" name="precio_noche" placeholder="Precio por noche">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput6" class="form-label">Precio por Semana</label>
                    <input type="number" class="form-control" name="precio_semana" placeholder="Precio por semana">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput7" class="form-label">Precio por Mes</label>
                    <input type="number" class="form-control" name="precio_mes" placeholder="Precio por mes">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput8" class="form-label">Reserva</label>
                    <input type="text" class="form-control" name="reserva" placeholder="Información para realizar reserva">
                </div>

                
                <div class="col-auto">
                    <input class="form-control" type="file" name="foto">
                    <div class="mb-3">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Subir</button>
                </div>
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($fotos as $foto)
                <div class="col">
                    <div class="card shadow-sm">
                        <img height="300" src="/foto/{{$foto->ruta}}" alt="Imagen">
                        <div class="card-body">
                        <p class="card-text"><strong>hotel:</strong> {{$foto->hotel}}</p>
                            <p class="card-text"><strong>Provincia:</strong> {{$foto->provincia}}</p>
                            <p class="card-text"><strong>Distrito:</strong> {{$foto->distrito}}</p>
                            <p class="card-text"><strong>Tipo de Habitación:</strong> {{$foto->tipo_habitacion}}</p>
                            <p class="card-text"><strong>Dirección:</strong> {{$foto->direccion}}</p>
                            <p class="card-text"><strong>Cuartos Disponibles:</strong> {{$foto->cuartos_disponibles}}</p>
                            <p class="card-text"><strong>Tipo de Habitación:</strong> {{$foto->tipo_habitacion}}</p>
                            <p class="card-text"><strong>Precio por Noche:</strong> {{$foto->precio_noche}}</p>
                            <p class="card-text"><strong>Precio por Semana:</strong> {{$foto->precio_semana}}</p>
                            <p class="card-text"><strong>Precio por Mes</strong> {{$foto->precio_mes}}</p>
                            <p class="card-text"><strong>Reserva:</strong> {{$foto->reserva}}</p>
                        
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="POST" action="{{ route('eliminarFoto') }}">
                                    @csrf
                                    <div class="btn-group">
                                        <input type="hidden" name="id_foto" value="{{$foto->id}}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Eliminar</button>
                                    </div>
                                </form>
                                <small class="text-muted">{{$foto->created_at}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</main>
@endsection
