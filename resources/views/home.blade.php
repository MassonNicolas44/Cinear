@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                @include('include.message')



                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                    <thead>
                                        <th>Sala</th>
                                        <th>Pelicula</th>
                                        <th>Fecha</th>
                                        <th>Accion</th>
                                    </thead>

                                    <tbody>
                                    @foreach($datos as $dato)
 
                                            <tr>
                                                <td>{{$dato}}</td>
                                                <td>{{$dato}}</td>
                                                <td>{{$dato}}</td>
                                                <td>{{$dato}}</td>
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
