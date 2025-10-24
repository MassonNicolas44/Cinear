@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Actores registrados') }}</div>

                @include('include.message')

                <div class="card-body">

                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Nacionalidad</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($actores as $actor)
                                        <tr>
                                            <td>{{$actor->id}}</td>
                                            <td>{{$actor->apellido}} {{$actor->nombre}}</td>
                                            <td>[{{$actor->nacionalidad->sigla}}] {{$actor->nacionalidad->descripcion}}</td>
                                            <td>
                                                <div class="grupoBottones">
                                                    <a href="{{ route('actor.editar',['id'=>$actor->id]) }}" ="sucess" class="bottonEditar"> Editar</a>
                                                    <a href="{{ route('actor.eliminar',['id'=>$actor->id]) }}"="sucess" class="bottonEliminar">Eliminar</a>
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
</div>

@endsection
