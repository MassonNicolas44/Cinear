@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Listado de usuarios') }}</div>

                @include('include.message')

                <div class="card-body">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Codigo de ingreso</th>
                                    <th>Nombre completo</th>
                                    <th>DNI</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Fecha de registro</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->codigo}}</td>
                                            <td>{{$usuario->nombre}} {{$usuario->apellido}}</td>
                                            <td>{{$usuario->dni}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->telefono}}</td>
                                            <td>{{$usuario->direccion}}</td>
                                            <td>{{$usuario->rol}}</td>
                                            <td>{{$usuario->estado}}</td>

                                            <?php 
                                                $fechaRegisto=date('d-m-Y',strtotime($usuario->created_at));
                                                $horaRegistro=(new DateTime($usuario->created_at))->format('H:i');
                                            ?>

                                            <td>{{$fechaRegisto}} [{{$horaRegistro}} Hs]</td>

                                            <td>
                                                <div class="list">
                                                    <a href="{{ route('usuario.editar',['id'=>$usuario->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar</a>

                                                    <?php if($usuario->estado=="Habilitada"){    ?>
                                                        <a href="{{ route('usuario.estado',['id'=>$usuario->id,'estado'=>"Inhabilitar"]) }}" ="sucess" class="btn btn-success btn-sm"> Inhabilitar</a>
                                                    <?php }else{  ?>
                                                        <a href="{{ route('usuario.estado',['id'=>$usuario->id,'estado'=>"Habilitar"]) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar</a>
                                                    <?php  }  ?>

                                                    <a href="{{ route('usuario.resetearContraseña',['id'=>$usuario->id]) }}" ="sucess" class="btn btn-danger btn-sm"> Resetear Contraseña</a>
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