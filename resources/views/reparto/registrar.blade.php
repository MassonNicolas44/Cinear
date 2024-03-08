@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Asignar actores a la pelicula: ') }} {{ $pelicula->nombre }} </div>

                <div class="container-avatar">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reparto.guardarRegistro') }}">
                        @csrf

                        <input type="hidden" name="idPelicula" value="{{$pelicula->id}}"/>

                        <div class="row mb-4">
                            <label for="actor" class="col-md-3 col-form-label text-md-end">{{ __('Actor') }}</label>

                            <div class="col-md-7">
                                <select id="id_Actor" type="text" class="form-control @error('actor') is-invalid @enderror" name="actor" value="{{ old('actor') }}" required autocomplete="actor" autofocus>

                                    @foreach($actores as $actor)
                                        <option value="{{ $actor['id'] }}"> [{{$actor->nacionalidad->sigla}}] {{ $actor->nombre }} {{ $actor->apellido }} </option>
                                    @endforeach

                                </select>

                                @error('actor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      
                        

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Asignar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Actores asignados a la pelicula') }} {{ $pelicula->nombre }} </div>


                <div class="card-body">

                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Actores</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($actoresPelicula as $actorPelicula)
                                        <tr>
                                            <td>{{$actorPelicula->id}}</td>
                                            <td>{{$actorPelicula->actor->nombre}} {{$actorPelicula->actor->apellido}} [{{$actorPelicula->actor->id}}]</td>
                                            <td>
                                                <div class="list">
                                                    <a href="{{ route('reparto.eliminar',['id'=>$actorPelicula->id,'idPelicula'=>$pelicula->id]) }}"="sucess" class="btn  btn-danger btn-sm">Remover</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
