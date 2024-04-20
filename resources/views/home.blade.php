@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>
                @include('include.message')
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Pelicula</th>
                                    <th>Sala</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                @foreach($datos as $dato)

                                    <form method="POST" action="{{ route('reserva.registrar') }}">
                                    @csrf
                                    <tr>
                                        <td>{{$dato->pelicula->nombre}}</td>
                                        <td>{{$dato->sala->nombre}}</td>
                                        <td>

                                            <?php
                                            //Formateo de fecha para visualizacion mas amigable
                                            $fechaInicio=date('d-m-Y',strtotime($dato->fechaInicio));
                                            $fechaFin=date('d-m-Y',strtotime($dato->fechaFin));

                                            $min=date('Y-m-d',strtotime($dato->fechaInicio));
                                            $max=date('Y-m-d',strtotime($dato->fechaFin));

                                            $hoy = date('Y-m-d');
                                            ?>

                                            <div class="row mb-4">
                                                <label for="fecha" class="col-md-6 col-form-label text-md-center">{{$fechaInicio}} al {{$fechaFin}}</label>

                                                <div class="col-md-3">
                                                    <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{$hoy}}"
                                                    
                                                    min="<?php echo $hoy;?>" 
                                                    
                                                    max="<?php echo $max;?>"
                                                    
                                                    required autocomplete="fecha" autofocus>

                                                    @error('fecha')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>  

                                        </td>

                                        <td>
                                            <input type="hidden" name="idPelicula" value="{{$dato->pelicula->id}}"/>
                                            <input type="hidden" name="idSala" value="{{$dato->sala->id}}"/>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Seleccionar') }}
                                            </button>
                                        </td>
                                        
                                    </tr>
                                    </form>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
