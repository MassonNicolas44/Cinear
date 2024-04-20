@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Datos de la reserva') }}</div>

                @include('include.message')

                <div class="card-body">

                    <?php
                        $Fecha=date('d-m-Y',strtotime($reserva->fecha_funcion));
                        $Hora=(new DateTime($reserva->hora_funcion))->format('H:i');
                    ?>

                    <h1>Numero de Ticket: {{$reserva->id}}</h1>
                    <h2>Pelicula: {{$reserva->funcion->pelicula->nombre}} [{{$reserva->funcion->pelicula->duracion}} Min]</h2>
                    <h2>Sala: {{$reserva->funcion->sala->nombre}}</h2>
                    <h3>Fecha: {{$Fecha}}</h3>
                    <h3>Hora: {{$Hora}} Hs</h3>
                    <h3>Cantidad de Boletos: {{$reserva->cantidad_boleto}}</h3>
                    <h3>Precio Final: {{$reserva->precio_final}} $</h3>

                    <a href="{{ route('home') }}"="sucess" class="btn  btn-danger">Ir al inicio</a>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
