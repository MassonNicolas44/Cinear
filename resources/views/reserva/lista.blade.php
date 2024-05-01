@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Filtrado de reserva') }} </div>

                <form method="GET" action="{{ route('reserva.lista') }}">
                    @csrf
                        <div class="homeFilter">
                            <label for="id_Pelicula" class="col-md-0 col-form-label text-md-end">Pelicula</label>
                            <div>
                                <select id="id_Pelicula" class="form-control {{ $errors->has('id_Pelicula') ? 'is-invalid' : '' }}" value="{{ old('id_Pelicula') }}" name="id_Pelicula"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($peliculas as $pelicula)
                                        <option value="{{ $pelicula['id'] }}">
                                            {{$pelicula->nombre}} [{{$pelicula->duracion}} Min]
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <label for="id_Sala" class="col-md-0 col-form-label text-md-end">Sala</label>
                            <div>
                                <select id="id_Sala" class="form-control {{ $errors->has('id_Sala') ? 'is-invalid' : '' }}" value="{{ old('id_Sala') }}" name="id_Sala"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($salas as $sala)
                                        <option value="{{ $sala['id'] }}">
                                            {{$sala->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-4">
                                <label for="fechaFuncion" class="col-md-6 col-form-label text-md-center">Fecha Funcion</label>
                                <div class="col-md-3">
                                    Desde: <input id="fechaFuncionInicio" type="date" class="form-control @error('fechaFuncionInicio') is-invalid @enderror" name="fechaFuncionInicio" value="{{ old('fechaFuncionInicio')}}"  autocomplete="fechaFuncionInicio" autofocus> 
                                    Hasta: <input id="fechaFuncionFin" type="date" class="form-control @error('fechaFuncionFin') is-invalid @enderror" name="fechaFuncionFin" value="{{ old('fechaFuncionFin')}}"  autocomplete="fechaFuncionFin" autofocus>
                                    
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
                                </div>
                            </div> 

                            <div class="row mb-4">
                                <label for="fechaReserva" class="col-md-6 col-form-label text-md-center">Fecha Reserva</label>
                                <div class="col-md-3">
                                    <input id="fechaReserva" type="date" class="form-control @error('fechaReserva') is-invalid @enderror" name="fechaReserva" value="{{ old('fechaReserva')}}"  autocomplete="fechaReserva" autofocus>

                                    @error('fechaReserva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                            
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Reporte de reservas') }} </div>

                        <div class="homeFilter">
                            
                            <br>
                            <input type="submit" name="reporte" value="Ver reporte de las reservas" class="btn  btn-success">
                            <br>
                            <br>
                            <input type="submit" name="reporte" value="Descargar reporte de las reservas" class="btn  btn-success">
                            <br>
                            <br>
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

