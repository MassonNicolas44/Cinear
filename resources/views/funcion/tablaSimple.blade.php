
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Listado de Sala y Pelicula') }}</div>

                @include('include.message')

                <div class="card-body">

                    {{-- Verificacion si hay datos para mostrar o no --}}
                    @if(count($datos)>0)
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                            <thead>
                                <th>Sala</th>
                                <th>Pelicula</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </thead>

                            <tbody>
                                    @foreach($datos as $dato) 
                                        <tr>
                                            <td>{{$dato->sala->nombre}}</td>
                                            <td>{{$dato->pelicula->nombre}}</td>

                                            <?php
                                                //Formateo de fecha y hora de valores de la base de datos
                                                $fechaInicio = (new DateTime($dato->fechaInicio))->format('d-m-Y');
                                                $fechaFin = (new DateTime($dato->fechaFin))->format('d-m-Y');
                                            ?>

                                            <td>{{$fechaInicio}}  al  {{$fechaFin}}</td>
                                            <td>

                                                <?php if($dato->estado=="Habilitada"){    ?>
                                                    <a href="{{ route('funcion.lista',['id'=>$dato->id]) }}" ="sucess" class="btn btn-primary btn-sm"> Seleccionar</a>
                                                    <a href="{{ route('funcion.estado',['id'=>$dato->id,'estado'=>"InhabilitarRango"]) }}" ="sucess" class="btn btn-success btn-sm"> Inhabilitar rango fecha</a>
                                                <?php }else{  ?>
                                                    <a href="{{ route('funcion.estado',['id'=>$dato->id,'estado'=>"HabilitarRango"]) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar rango fecha</a>
                                                <?php  }  ?>


                                            </td>
                                        </tr>  
                                    @endforeach 
                            </tbody>
                        </table>
                    @else
                        <h1>No hay datos para mostrar</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

