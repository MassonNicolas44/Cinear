@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Idiomas regitrados') }}</div>

                @include('include.message')

                <div class="card-body">

                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Idioma</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($idiomas as $idioma)
                                        <tr>
                                            <td>{{$idioma->id}}</td>
                                            <td>{{$idioma->descripcion}}</td>
                                            <td>
                                                <div class="grupoBottones">
                                                    <a href="{{ route('idioma.editar',['id'=>$idioma->id]) }}" ="sucess" class="bottonEditar"> Editar</a>
                                                    <a href="{{ route('idioma.eliminar',['id'=>$idioma->id]) }}"="sucess" class="bottonEliminar">Eliminar</a>
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
