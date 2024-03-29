@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ingresar nueva sala') }} </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sala.guardarRegistro') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="nombre" class="col-md-3 col-form-label text-md-end">{{ __('Nombre de la Sala') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="cantAsiento" class="col-md-3 col-form-label text-md-end">{{ __('Cantidad de Asientos Sala') }}</label>

                            <div class="col-md-2">
                                <input id="cantAsiento" type="number" class="form-control @error('cantAsiento') is-invalid @enderror" name="cantAsiento" value="{{ old('cantAsiento') }}" required autocomplete="cantAsiento" autofocus>

                                @error('cantAsiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
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
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">{{ __('Listado de Salas') }}</div>

                @include('include.message')

                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Cantidad de Asientos</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($salas as $sala)
                                        <tr>
                                            <td>{{$sala->id}}</td>
                                            <td>{{$sala->nombre}}</td>
                                            <td>{{$sala->cantidad_asiento}}</td>
                                            <td>{{$sala->estado}}</td>
                                            <td>
                                                <div class="list">

                                                    <a href="{{ route('sala.editar',['id'=>$sala->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar</a>

                                                    <?php if($sala->estado=="Habilitada"){    ?>
                                                        <a href="{{ route('sala.estado',['id'=>$sala->id,'estado'=>"Inhabilitar"]) }}" ="sucess" class="btn btn-success btn-sm"> Inhabilitar</a>
                                                    <?php }else{  ?>
                                                        <a href="{{ route('sala.estado',['id'=>$sala->id,'estado'=>"Habilitar"]) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar</a>
                                                    <?php  }  ?>
                                                                                                        
                                                    <a href="{{ route('sala.eliminar',['id'=>$sala->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar</a>
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
