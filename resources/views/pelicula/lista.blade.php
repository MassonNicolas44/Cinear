@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reportes') }} </div>
                <form method="GET" action="{{ route('pelicula.reporte') }}">
                    @csrf
                    <div class="grupoReporte">
                        <img src="{{ env('APP_URL','').('/storage/app/public/iconoVer.png') }}" >
                        <div class="separar"></div>
                        <input type="submit" class="btn btn-success" formaction="{{ route('pelicula.reporte') }}" formmethod="GET" formtarget="_blank" name="reporte" value="Ver reporte de las peliculas"> @csrf
                        <img src="{{ env('APP_URL','').('/storage/app/public/iconoDescarga.png') }}" >
                        <div class="separar"></div>
                        <input type="submit" class="btn btn-success" formaction="{{ route('pelicula.reporte') }}" formmethod="GET" formtarget="_blank" name="reporte" value="Descargar reporte de las peliculas"> @csrf
                        <select id="estado" name="estado" style="display:none;">
                        <option value="">-- Escoja una Opción --</option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado }}" {{ $estadoBuscar == $estado ? 'selected' : '' }}>
                                {{ $estado }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Filtrar por: ') }} </div>

                <form method="GET" action="{{ route('pelicula.lista') }}">
                    @csrf
                        <div class="grupoFiltrarFuncion">

                                <label for="estado" class="col-md-1 col-form-label text-md-end"> Estado &nbsp &nbsp</label>
                        
                                <select id="estado" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" value="{{ old('estado') }}" name="estado"/>
                                    <option value="">-- Escoja una Opcion --</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado }}" {{ $estadoBuscar == $estado ? 'selected' : '' }} >
                                            {{$estado}}
                                        </option>
                                    @endforeach
                                </select>
                                
                            <div class="grupoBusqueda" style="gap: 10px; margin-bottom: 0px;">
                                <input type="submit" class="bottonBuscar" value="Buscar">
                                <a href="{{ route('pelicula.lista') }}" class="bottonLimpiar">Limpiar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Peliculas registradas') }}</div>

                @include('include.message')

                <div class="card-body">
                    {{-- Verificacion si hay datos para mostrar o no --}}
                    @if(count($peliculas)>0)   
                        <div class="table-responsive">
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
                    @else
                        <div class="mensaje">
                            No hay datos para mostrar
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
