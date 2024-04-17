@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reserva de la pelicula: ') }} '{{$pelicula->nombre}}' para la fecha '{{$fecha}}'</div>

                @include('include.message')

                @if(!empty($message))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('reserva.guardarRegistro') }}">
                        @csrf

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                            <thead>
                                <th>Sala</th>
                                <th>Pelicula</th>
                                <th>Fecha</th>
                                <th>Horario/s</th>
                                <th>Boleto/s</th>
                                <th>Accion</th>
                            </thead>

                            <input type="hidden" name="errorPelicula" value="{{$pelicula->nombre}}"/>
                            <input type="hidden" name="errorFecha" value="{{$fecha}}"/>

                            <tbody>
                                @foreach($funciones as $funcion)
                                    <tr>
                                        <td>{{$funcion->sala->nombre}}
                                            <input type="hidden" name="idFuncion" value="{{$funcion->id}}"/>
                                        </td>
                                        <td>{{$funcion->pelicula->nombre}}</td>
                                        <td>{{$fecha}}</td>
                                        <td>
                                            <div class="row mb-4">
                                                <label for="horario" class="col-md-1 text-center"></label>

                                                <div class="col-md-9">
                                                    <select id="horario" type="time" class="form-control @error('horario') is-invalid @enderror" name="horario" value="{{ $horarios["0"] }}" autocomplete="horario" autofocus>
                                                        @if($horarios["0"]=="Sin Horario")
                                                            <option value="{{ $horarios["0"] }}"> Sin Horario</option>
                                                        @else
                                                            @foreach($horarios as $hora)
                                                                    <option value="{{ $hora }}"> {{ $hora }} Hs</option>
                                                            @endforeach
                                                        @endif
                                                    </select>

                                                    @error('horario')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class="row mb-4">
                                                <label for="cantBoleto" class="col-md-4 col-md-offset-4"></label>
                                                <div class="col-md-6">
                                                    <input id="cantBoleto" type="number" class="form-control @error('cantBoleto') is-invalid @enderror" name="cantBoleto" min ="1" max="{{ $funcion->sala->cantidad_asiento }}" value="1" required autocomplete="cantBoleto" autofocus>

                                                    @error('cantBoleto')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="list">
                                                @if($horarios["0"]=="Sin Horario")
                                                    <a class="btn  btn-danger btn-sm">Inhabilitar Con CSS</a>
                                                @else
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Reservar') }}
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

@include('reserva.tablaRegistro')

@endsection
