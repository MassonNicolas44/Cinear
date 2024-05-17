@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Nacionalidades registradas') }}</div>

                @include('include.message')

                <div class="card-body">

                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Sigla</th>
                                    <th>Nombre</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($nacionalidades as $nacionalidad)
                                        <tr>
                                            <td>{{$nacionalidad->id}}</td>
                                            <td>{{$nacionalidad->sigla}}</td>
                                            <td>{{$nacionalidad->descripcion}}</td>
                                            <td>
                                                <div class="grupoBottones">
                                                    <a href="{{ route('nacionalidad.editar',['id'=>$nacionalidad->id]) }}" ="sucess" class="bottonEditar"> Editar</a>
                                                    <a href="{{ route('nacionalidad.eliminar',['id'=>$nacionalidad->id]) }}"="sucess" class="bottonEliminar">Eliminar</a>
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
