
<!DOCTYPE html>
<html  dir="ltr" lang="es" xml:lang="es">
<head>
    
    <title> Minerva</title> 

    <link rel="icon" href="https://seeklogo.com/images/C/cafe-minerva-nuevo-fondo-claro-logo-2AE9A20374-seeklogo.com.png" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .hero {
            position: relative;
            text-align: center;
            color: #fff;
            padding: 200px 40px;
            background-image: url('https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExNGIydmhhc2pkNnVtdWU2MjRjemcxOGhyeGxiMjZoYTVmeXRuNzF5eiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/TVcHJ3fR3BaSs/giphy.gif');
            background-size: cover;
            background-position: center;
            margin-bottom: 50px;
        }

        .text-container {
            position: relative;
            z-index: 1;
        }

        .text-container h1 {
            color: black;
            font-size: 3em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .text-container h3 {
            font-size: 1.5em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .info-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            color: #DC7633;
            font-size: 1.5em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
  </style>

@extends('layouts.app')

@section('content')
<div class="hero">
        <div class="text-container">
            <h1>Hoteles Disponibles para Hoy</h1>
            <h3>Consigue el Mejor Precio en la Ciudad Blanca-Arequipa</h3>
            <div style="display: flex; justify-content: space-between;">
                <h4>Fecha actual: {{ \Carbon\Carbon::now()->toDateString() }}</h4>
                <h4 id="hora">Hora actual: {{ \Carbon\Carbon::now()->toTimeString() }}</h4>
            </div>
        </div>
    </div>

<script>
    function actualizarHora() {
        const horaActualElement = document.getElementById('hora');
        const ahora = new Date();
        const horas = ahora.getHours();
        const minutos = ahora.getMinutes();
        const segundos = ahora.getSeconds();

        const horaFormateada = `${horas.toString().padStart(2, '0')}:${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
        
        horaActualElement.innerText = `Hora actual: ${horaFormateada}`;
    }

    setInterval(actualizarHora, 1000);
</script>
<h3 style="text-align: center; color: black;">Disponibilidad de 8am a 5pm</h3>


<div class="container">
    <div class="row row-cols-3">
        @foreach($fotos as $foto)
        <div class="col">
            <div class="card">
                <img height="300" src="/foto/{{$foto->ruta}}" alt="Imagen">
                <div class="card-body">
                <div class="card-body">
                
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#infoCollapse{{$foto->id}}" aria-expanded="false" aria-controls="infoCollapse{{$foto->id}}" style="background-color: black; color: white;">
                Información
                    <div class="collapse" id="infoCollapse{{$foto->id}}">
                        <p><strong>Hotel:</strong> {{$foto->hotel}}</p>
                        <p><strong>Descripción:</strong>{{$foto->descripcion}}</p>
                        <p><strong>Provincia:</strong> {{$foto->provincia}}</p>
                        <p><strong>Distrito:</strong> {{$foto->distrito}}</p>
                        <p><strong>Dirección:</strong> {{$foto->direccion}}</p>
                        <p><strong>Habitaciones Disponibles:</strong> {{$foto->cuartos_disponibles}}</p>
                        <p><strong>Tipo de Habitación:</strong> {{$foto->tipo_habitacion}}</p>
                        <p><strong>Precio por Noche:</strong> {{$foto->precio_noche}}</p>
                        <p><strong>Precio por Semana:</strong> {{$foto->precio_semana}}</p>
                        <p><strong>Precio por Mes:</strong> {{$foto->precio_mes}}</p>
                        <p><strong>Reserva:</strong> {{$foto->reserva}}</p>
                    </div>
                </div>
                


                <form id="reservaForm">
    <label for="dia">Día:</label>
    <input type="text" id="dia" name="dia"><br><br>
    
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha"><br><br>

    <label for="tipoHabitacion">Tipo de Habitación:</label>
    <select id="tipoHabitacion" name="tipoHabitacion">
        <option value="individual">Individual</option>
        <option value="doble">Doble</option>
        <option value="suite">Suite</option>
    </select><br><br>

    <button id="reservarBtn" class="btn btn-primary">Reservar</button>

    <div id="pagoForm" style="display: none;">
        <h3>Pagar</h3>
        <label for="monto">Monto:</label>
        <input type="text" id="monto" name="monto" readonly><br><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
        
        <label for="tarjeta">Número de tarjeta:</label>
        <input type="text" id="tarjeta" name="tarjeta"><br><br>

        <button id="realizarPagoBtn" class="btn btn-success">Realizar Pago</button>
    </div>
</form>


<script>
    document.getElementById('reservarBtn').addEventListener('click', function(event) {
        event.preventDefault();
        

        const dia = document.getElementById('dia').value;
        const fecha = document.getElementById('fecha').value;
        const tipoHabitacion = document.getElementById('tipoHabitacion').value;
        let precio;

  
        if (tipoHabitacion === 'individual') {
            precio = 10;
        } else if (tipoHabitacion === 'doble') {
            precio = 20;
        } else if (tipoHabitacion === 'suite') {
            precio = 50;
        }

    
        const numeroReserva = Math.floor(Math.random() * 1000) + 1;
        const infoReserva = `Número de reserva: ${numeroReserva}\nDía: ${dia}\nFecha: ${fecha}\nTipo de Habitación: ${tipoHabitacion}\nPrecio: ${precio}`;
        
        document.getElementById('monto').value = `$${precio}`;
        document.getElementById('pagoForm').style.display = 'block';
    });

    document.getElementById('realizarPagoBtn').addEventListener('click', function(event) {
        event.preventDefault();

       
        const nombre = document.getElementById('nombre').value;
        const tarjeta = document.getElementById('tarjeta').value;
        const monto = document.getElementById('monto').value;

        const asunto = 'Confirmación de Pago';
        const mensaje = `Estimado ${nombre}, su pago de ${monto} ha sido procesado con éxito. Gracias por su reserva, presentar este ticket al hotel`;
        const destinatario = email;
     
        fetch('/enviar_correo.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                destinatario: destinatario,
                asunto: asunto,
                mensaje: mensaje
            })
        }).then(response => {
            if (response.ok) {
                alert('Correo electrónico enviado con éxito');
            } else {
                alert('Error al enviar el correo electrónico');
            }
        }).catch(error => {
            alert('Error al enviar el correo electrónico');
        });
    });

</script>


                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$foto->id}}" aria-expanded="false" aria-controls="collapse{{$foto->id}}">
                            <i class="bi bi-chat text-primary"></i>
                            {{count($foto->comentario)}}
                        </button>
                        <small class="text-muted">{{$foto->User->name}}</small>
                    </div>
                    <div class="collapse" id="collapse{{$foto->id}}">
                        @foreach($foto->comentario as $comentario)
                        <div class="card card-body">
                            {{ $comentario->comentario }}
                            <small class="text-muted">{{ $comentario->User->name }}</small>
                            <form action="{{ route('comentario.like', ['id' => $comentario->id]) }}" method="POST">
                            @if(auth()->check() && $comentario->User->id === auth()->id())
                                    <form method="POST" action="{{ route('eliminarComentario') }}">
                                        @csrf
                                        <input type="hidden" name="id_comentario" value="{{ $comentario->id }}">
                                        <button type="submit" class="btn btn-danger">Eliminar Comentario</button>
                                    </form>
                                @endif
                            </div>
                            @csrf
                                <button type="submit">
                                <i class="bi bi-heart"></i>
                            {{ $comentario->likes }} 
                                </button>
                            
                            </form>

                            <div class="card card-body">
                        </div>
                        @endforeach
                        <form method="POST" action="{{ route('subirComentario') }}">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-9">
                                        <input type="hidden" name="id_foto" value="{{$foto->id}}">
                                        <input type="text" class="form-control" name="comentario" placeholder="Ingrese su comentario">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-chat"></i>
                                        </button>
                                    </div>
                                    

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
