@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reportes') }} </div>
                <form method="GET" action="{{ route('pelicula.reporte') }}">
                    @csrf
                        <div class="homeFilter">
                            
                            <br>
                            <input type="submit" name="reporte" value="Ver reporte de las peliculas" class="btn  btn-success">
                            <br>
                            <br>
                            <input type="submit" name="reporte" value="Descargar reporte de las peliculas" class="btn  btn-success">
                            <br>
                            <br>
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
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Peliculas registradas') }}</div>

                @include('include.message')

                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Duracion</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Nacionalidad</th>
                            <th>Idioma</th>
                            <th>Tipo</th>
                            <th>Restriccion</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </thead>

                        <tbody>
                            @foreach($peliculas as $pelicula)
                                <tr>
                                    <td>{{$pelicula->id}}</td>
                                    <td>{{$pelicula->nombre}} [{{$pelicula->año}}] </td>
                                    <td>{{$pelicula->duracion}} Min</td>
                                    <td>{{$pelicula->descripcion}}</td>
                                    <td>{{$pelicula->categoria->descripcion}}</td>
                                    <td> [{{$pelicula->nacionalidad->sigla}}] {{$pelicula->nacionalidad->descripcion}}</td>
                                    <td>{{$pelicula->idioma->descripcion}}</td>
                                    <td>{{$pelicula->tipo->descripcion}}</td>
                                    <td>{{$pelicula->restriccion->descripcion}}</td>
                                    <td>$ {{$pelicula->precio}}</td>
                                    <td><img src="{{ asset('../storage/app/imagenes/' . $pelicula->image_path) }}" width="100%" height="85px" ></td>
                                    <td>{{$pelicula->estado}}</td>
                                    <td>
                                        <div class="grupoBottones">
                                            <a href="{{ route('pelicula.editar',['id'=>$pelicula->id]) }}" ="sucess" class="bottonEditar"> Editar</a>

                                            <a href="{{ route('reparto.asignar',['id'=>$pelicula->id]) }}" ="sucess" class="bottonSeleccionar"> Reparto </a>

                                            <?php if($pelicula->estado=="Habilitada"){    ?>
                                                <a href="{{ route('pelicula.estado',['id'=>$pelicula->id,'estado'=>"Inhabilitar"]) }}" ="sucess" class="bottonInhabilitar"> Inhabilitar</a>
                                            <?php }else{  ?>
                                                <a href="{{ route('pelicula.estado',['id'=>$pelicula->id,'estado'=>"Habilitar"]) }}" ="sucess" class="bottonHabilitar"> Habilitar</a>
                                            <?php  }  ?>
                                                        
                                            <a href="{{ route('pelicula.eliminar',['id'=>$pelicula->id]) }}"="sucess" class="bottonEliminar">Eliminar</a>
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
