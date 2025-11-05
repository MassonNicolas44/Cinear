@extends('layouts.app')

@section('content')

@if(Auth::user()->rol=="Administrador")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">{{ __('Reportes') }} </div>
                <form method="GET" action="{{ route('reserva.lista') }}">
                    @csrf
                    <div class="grupoReporte">
                        
                        <img src="{{ env('APP_URL','').('/storage/app/public/iconoVer.png') }}" >
                        <div class="separar"></div>
                        <input type="submit" name="reporte" value="Ver reporte de las reservas" class="btn  btn-success">

                        <img src="{{ env('APP_URL','').('/storage/app/public/iconoDescarga.png') }}" >
                        <div class="separar"></div>
                        <input type="submit" name="reporte" value="Descargar reporte de las reservas" class="btn  btn-success">
                    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            @include('include.message')
                <div class="card-header">{{ __('Filtrar por:') }} </div>
                        <div class="grupoFiltrar">
<label for="id_Pelicula" class="col-md-1 col-form-label text-md-center">Pelicula</label>
                                <select id="id_Pelicula" class="form-control {{ $errors->has('id_Pelicula') ? 'is-invalid' : '' }}" value="{{ old('id_Pelicula') }}" name="id_Pelicula"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($peliculas as $pelicula)
                                        <option value="{{ $pelicula['id'] }}" {{ $peliculaBuscar == $pelicula['id'] ? 'selected' : '' }} >
                                            {{$pelicula->nombre}} [{{$pelicula->duracion}} Min]
                                        </option>
                                    @endforeach
                                </select>
                            
                            
                            <label for="id_Sala" class="col-md-1 col-form-label text-md-center">Sala</label>
                                <select id="id_Sala" class="form-control {{ $errors->has('id_Sala') ? 'is-invalid' : '' }}" value="{{ old('id_Sala') }}" name="id_Sala"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($salas as $sala)
                                        <option value="{{ $sala['id'] }}" {{ $salaBuscar == $sala['id'] ? 'selected' : '' }} >
                                            {{$sala->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                         <div class="grupoFiltrarFecha">
                            
                                    <label>Fecha Funcion</label>
                             
                                    <div class="row">
                                        <div class="columnaFecha">
                                            <label >Desde: </label>
                                            <input id="fechaFuncionInicio" type="date" class="form-control @error('fechaFuncionInicio') is-invalid @enderror" name="fechaFuncionInicio" value="{{ old('fechaFuncionInicio',request('fechaFuncionInicio'))}}"  autocomplete="fechaFuncionInicio" autofocus> 
                                        </div>
                                        <div class="columnaFecha">
                                            <label>Hasta: </label>
                                            <input id="fechaFuncionFin" type="date" class="form-control @error('fechaFuncionFin') is-invalid @enderror" name="fechaFuncionFin" value="{{ old('fechaFuncionFin',request('fechaFuncionFin'))}}"  autocomplete="fechaFuncionFin" autofocus>
                                        </div>
                                    </div>
                                    @error('fechaFuncionInicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @error('fechaFuncionFin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label>Fecha Reserva</label>
                                    <div class="row" style="margin-left:0%;">
                                        <div class="columnaFecha">
                                            <input id="fechaReserva"  style="width:215px;"  type="date" class="form-control @error('fechaReserva') is-invalid @enderror" name="fechaReserva" value="{{ old('fechaReserva',request('fechaReserva'))}}"  autocomplete="fechaReserva" autofocus>
                                        </div>
                                    </div>
                                    @error('fechaReserva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <br>
                            <div class="grupoBusqueda">
                              <input type="submit" class="bottonBuscar" value="Buscar">
                              <a href="{{ route('reserva.lista') }}" class="bottonLimpiar">Limpiar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

@include('reserva.tablaLista')


@endsection

