@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Listado de Idiomas') }}</div>

                @include('include.message')

                <div class="card-body">

                
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
                                                <div class="list">
                                                    <a href="{{ route('idioma.editar',['id'=>$idioma->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar</a>
                                                    <a href="{{ route('idioma.eliminar',['id'=>$idioma->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar</a>
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
