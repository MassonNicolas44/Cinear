@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Filtrar por: ') }} </div>

                <form method="GET" action="{{ route('funcion.lista') }}">
                    @csrf
                        <div class="grupoFiltrarFuncion">
                            <label for="id_Pelicula" class="col-md-1 col-form-label text-md-end"> Pelicula &nbsp &nbsp</label>
                    
                                <select id="id_Pelicula" class="form-control {{ $errors->has('id_Pelicula') ? 'is-invalid' : '' }}" value="{{ old('id_Pelicula') }}" name="id_Pelicula"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($peliculas as $pelicula)
                                        <option value="{{ $pelicula['id'] }}">
                                            {{$pelicula->nombre}} [{{$pelicula->duracion}} Min]
                                        </option>
                                    @endforeach
                                </select>
                        
                            
                            <label for="id_Sala" class="col-md-1 col-form-label text-md-end"> Sala &nbsp &nbsp</label>
                        
                                <select id="id_Sala" class="form-control {{ $errors->has('id_Sala') ? 'is-invalid' : '' }}" value="{{ old('id_Sala') }}" name="id_Sala"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($salas as $sala)
                                        <option value="{{ $sala['id'] }}">
                                            {{$sala->nombre}}
                                        </option>
                                    @endforeach
                                </select>
                        
                                <label for="estado" class="col-md-1 col-form-label text-md-end"> Estado &nbsp &nbsp</label>
                        
                                <select id="estado" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" value="{{ old('estado') }}" name="estado"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado }}" {{ $estadoBuscar == $estado ? 'selected' : '' }} >
                                            {{$estado}}
                                        </option>
                                    @endforeach
                                </select>

                            <div class="grupoBusqueda" style="gap: 10px; margin-bottom: 0px;">
                                <input type="submit" class="bottonBuscar" value="Buscar">
                                <a href="{{ route('funcion.lista') }}" class="bottonLimpiar">Limpiar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('funcion.tablaSimple')

<br>

@include('funcion.tablaCompleta')


@endsection