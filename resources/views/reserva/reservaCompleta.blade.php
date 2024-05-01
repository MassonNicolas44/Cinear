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
                        $fechaFuncion=date('d-m-Y',strtotime($reserva->fecha_funcion));
                        $horaFuncion=(new DateTime($reserva->hora_funcion))->format('H:i');

                        $fechaReserva=date('d-m-Y',strtotime($reserva->created_at));
                        $horaReserva=(new DateTime($reserva->created_at))->format('H:i');
                    ?>

                    <h1>Numero de Ticket: {{$reserva->id}}</h1>
                    <h3>Fecha Reserva: {{$fechaReserva}}  [{{$horaReserva}} Hs]</h3>
                    <h2>Pelicula: {{$reserva->funcion->pelicula->nombre}} [{{$reserva->funcion->pelicula->duracion}} Min]</h2>
                    <h2>Sala: {{$reserva->funcion->sala->nombre}}</h2>
                    <h3>Fecha Funcion: {{$fechaFuncion}}</h3>
                    <h3>Hora Funcion: {{$horaFuncion}} Hs</h3>
                    <h3>Cantidad de Boletos: {{$reserva->cantidad_boleto}}</h3>
                    <h3>Precio Final: {{$reserva->precio_final}} $</h3>

                    <a href="{{ route('home') }}"="sucess" class="btn  btn-danger">Ir al inicio</a>
                    <br>

                    <form method="GET" action="{{ route('reserva.comprobante') }}">
                    @csrf
                        <input type="hidden" name="idComprobante" value="{{$reserva->id}}"/>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary" value="Descargar comprobante">
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
