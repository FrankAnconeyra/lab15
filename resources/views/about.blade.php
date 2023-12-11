<!-- resources/views/static/about.blade.php -->

@extends('layouts.app')

@section('content')
@yield('content')

<div class="max-w-7xl mx-auto p-6 lg:p-8">
        <!-- Nuevo encabezado para la página "Sobre Nosotros" -->
        <header class="bg-primary text-white p-4">
           
        </header>



    <div class="container mx-auto p-6 lg:p-8">
        <h1 class="display-4 font-weight-bold mb-6 text-primary">Acerca de Nosotros</h1>
        


        
        <div class="row">
            <div class="col-lg-6 mb-8">
                <img src="{{ asset('images/emperor.jfif') }}" alt="Oficina moderna" class="img-fluid rounded shadow">
            </div>
            




            <div class="col-lg-6">
                <p class="lead text-secondary mb-4">
                    En Emperador, nuestra pasión es proporcionar experiencias de alojamiento excepcionales.
                </p>
                <p class="lead text-secondary mb-4">
                    El Hotel "EL Emperador" es el mejor hotel de Cerro Colorado, ubicado en la hermosa provincia de Cerro Colorado, en el distrito de Ciudad Municipal. Nuestra dirección es Av. 54 manzana 15.
                    Ofrecemos habitaciones individuales, dobles y suite, con precios por noche, semana y mes. Aceptamos reservas todos los días de la semana.
                </p>


                <p class="text-xl text-secondary leading-relaxed mb-4">
                    Desde nuestra fundación en 2000, nos hemos dedicado a facilitar la conexión entre propietarios e inquilinos, creando un espacio donde la búsqueda del lugar perfecto sea sencilla y sin complicaciones.
                </p>
                
                <p class="text-xl text-secondary leading-relaxed mb-4">
                    Nuestro equipo está compuesto por profesionales comprometidos que trabajan incansablemente para garantizar la calidad y seguridad en cada transacción.
                </p>
                
                <p class="text-xl text-secondary leading-relaxed mb-4">
                    Agradecemos tu confianza en  "EL Emperador" para satisfacer tus necesidades de alojamiento. Estamos aquí para hacer que tu experiencia sea inolvidable.
                </p>
                
                <h2 class="text-2xl font-bold mb-4 text-primary">Nuestros Servicios</h2>
                
                <p class="text-xl text-secondary leading-relaxed mb-4">
                    Ofrecemos una amplia gama de servicios para ayudarte a encontrar el alojamiento perfecto. Ya sea que estés buscando una habitación individual, un piso completo, o incluso una casa, tenemos opciones para todos los gustos y presupuestos.
                </p>
                
                <p class="text-xl text-secondary leading-relaxed mb-4">
                    Además de nuestro servicio de alquiler, también ofrecemos asesoramiento legal y soporte durante todo el proceso de alquiler. Nuestro objetivo es que te sientas seguro y respaldado en cada paso del camino.
                </p>
                
                <p class="text-xl text-secondary leading-relaxed mb-4">
                    Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos. Estamos aquí para ayudarte.
                </p>

                <h3 class="text-xl font-bold mb-4 text-primary">Tipos de propiedades</h3>
                <ul class="list-disc mt-4 text-secondary">
                    <li>Habitación</li>
                    <li>Piso</li>
                    <li>Casa</li>
                    <li>Apartamento</li>
                </ul>

                <h3 class="text-xl font-bold mb-4 text-primary">Servicios</h3>
                <ul class="list-disc mt-4 text-secondary">
                    <li>Fotos</li>
                    <li>Descripciones detalladas</li>
                    <li>Filtros de búsqueda</li>
                    <li>Sistema de calificación</li>
                    <li>Sistema de mensajería</li>
                </ul>

                <h3 class="text-xl font-bold mb-4 text-primary">Características</h3>
                <ul class="list-disc mt-4 text-secondary">
                    <li>Plataforma fácil de usar</li>
                    <li>Sistema de seguridad integrado</li>
                    <li>Soporte al cliente las 24 horas del día, los 7 días de la semana</li>
                </ul>

                <h3 class="text-xl font-bold mb-4 text-primary">Testimonios de nuestros clientes</h3>
                <ul class="list-disc mt-4 text-secondary">
                    <li>
                        "Me encantó la amplia selección de propiedades disponibles en "EL Emperador". Encontré el alojamiento perfecto para mis necesidades y mi presupuesto." - Jose Maria
                    </li>
                    <li>
                        "El servicio al cliente en "EL Emperador" fue excelente. Me ayudaron a encontrar el alojamiento perfecto y me respondieron a todas mis preguntas rápidamente." - Andres Condori
                    </li>
                    <li>
                        "Estoy muy contento con mi experiencia en "EL Emperador". Encontré un alojamiento seguro y asequible que me satisfizo plenamente." - Camila Flores
                    </li>
                </ul>

                <p class="text-xl text-secondary leading-relaxed mb-4">
                    "EL Emperador" ofrece una amplia gama de características y beneficios que hacen que sea la plataforma de alquiler de habitaciones o pisos perfecta para ti. Estas características incluyen:
                </p>

                <ul class="list-disc mt-4 text-secondary">
                    <li>
                        Una amplia selección de propiedades para elegir, desde habitaciones individuales hasta apartamentos completos.
                    </li>
                    <li>
                        Precios competitivos para que puedas encontrar el alojamiento adecuado para tu presupuesto.
                    </li>
                    <li>
                        Un servicio al cliente excepcional para ayudarte a encontrar el alojamiento perfecto y responder a todas tus preguntas.
                    </li>
                    <li>
                        Herramientas y recursos para ayudarte a organizar tu mudanza y aclimatarte a tu nuevo hogar.
                    </li>
                </ul>

                <p class="text-xl text-secondary leading-relaxed mb-4">
                    ¿Quieres saber más sobre "EL Emperador"? Ponte en contacto con nosotros y te ayudaremos a encontrar el alojamiento perfecto para ti.
                </p>

                <div class="text-center mt-4">
                    <a href="{{ route('contact') }}" class="btn btn-primary">Contactar</a>
                </div>
                
                <header >
           
           </header>
                
            </div>
        </div>
    </div>
    <header class="bg-primary text-white p-4">
           
           </header>
@endsection