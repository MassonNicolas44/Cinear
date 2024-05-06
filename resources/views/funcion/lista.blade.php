@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Filtrar por: ') }} </div>

                <form method="GET" action="{{ route('funcion.lista') }}">
                    @csrf
                        <div class="grupoFiltrar">
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
                        
                            <div class="col-md-2 col-form-label text-md-end">
                                <input type="submit" class="bottonBuscar" value="Buscar">
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