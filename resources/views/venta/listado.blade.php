@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reportes') }} </div>

                        <div class="homeFilter">
                            
                            <br>
                            <input type="submit" name="reporte" value="Ver reporte de las ventas" class="btn  btn-success">
                            <br>
                            <br>
                            <input type="submit" name="reporte" value="Descargar reporte de las ventas" class="btn  btn-success">
                            <br>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Filtrar por: ') }} </div>

                <form method="GET" action="{{ route('venta.listado') }}">
                    @csrf
                     <div class="grupoFiltrar">
                            <label for="id_Pelicula" class="col-md-1 col-form-label text-md-center">Pelicula</label>
                            <div style="flex: 0 0 auto;width:35%;padding-right:10%;"> 
                                <select id="id_Pelicula" class="form-control {{ $errors->has('id_Pelicula') ? 'is-invalid' : '' }}" value="{{ old('id_Pelicula') }}" name="id_Pelicula"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($peliculas as $pelicula)
                                        <option value="{{ $pelicula['id'] }}">
                                            {{$pelicula->nombre}} [{{$pelicula->duracion}} Min]
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <label for="id_Sala" class="col-md-1 col-form-label text-md-center">Sala</label>
                            <div style="flex: 0 0 auto;width:30%;padding-right:5%;"> 
                                <select id="id_Sala" class="form-control {{ $errors->has('id_Sala') ? 'is-invalid' : '' }}" value="{{ old('id_Sala') }}" name="id_Sala"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($salas as $sala)
                                        <option value="{{ $sala['id'] }}">
                                            {{$sala->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                         </div>

                         <div class="grupoFiltrar2">
                                <label for="fechaFuncion" class="col-md-2 col-form-label text-md-center">Fecha Funcion</label>
                                <div class="col-md-3">
                                    <label class="col-md-6 col-form-label text-md-rigth">Desde: </label>
                                    <input id="fechaFuncionInicio" type="date" class="form-control @error('fechaFuncionInicio') is-invalid @enderror" name="fechaFuncionInicio" value="{{ old('fechaFuncionInicio')}}"  autocomplete="fechaFuncionInicio" autofocus> 
                                    
                                    <label class="col-md-6 col-form-label text-md-rigth">Hasta: </label>
                                    <input id="fechaFuncionFin" type="date" class="form-control @error('fechaFuncionFin') is-invalid @enderror" name="fechaFuncionFin" value="{{ old('fechaFuncionFin')}}"  autocomplete="fechaFuncionFin" autofocus>
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

                                    <label for="fechaReserva" class="col-md-3 col-form-label text-md-center">Fecha Reserva</label>
                                    <div class="col-md-3"> 
                                        <input id="fechaReserva" type="date" class="form-control @error('fechaReserva') is-invalid @enderror" name="fechaReserva" value="{{ old('fechaReserva')}}"  autocomplete="fechaReserva" autofocus>
                                    </div>

                                    @error('fechaReserva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <br>
                            <input type="submit" class="bottonBuscar" value="Buscar">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

@include('venta.tabla')

@endsection

