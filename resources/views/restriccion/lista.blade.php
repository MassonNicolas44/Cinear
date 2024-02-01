@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Listado de Restriccion de edad') }}</div>

                <div class="container-avatar">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
        
                    @endif
                </div>

                <div class="card-body">

                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Restriccion de edad</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($restricciones as $restriccion)
                                        <tr>
                                            <td>{{$restriccion->id}}</td>
                                            <td>{{$restriccion->descripcion}}</td>
                                            <td>
                                                <div class="list">
                                                    <a href="{{ route('restriccion.editar',['id'=>$restriccion->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar</a>
                                                    <a href="{{ route('restriccion.eliminar',['id'=>$restriccion->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar</a>
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
