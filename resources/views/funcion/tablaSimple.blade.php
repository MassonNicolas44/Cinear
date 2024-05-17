
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Salas y peliculas registradas') }}</div>

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
                                            <div class="grupoBottones">
                                                <?php if($dato->estado=="Habilitada"){    ?>
                                                    <a href="{{ route('funcion.lista',['id'=>$dato->id]) }}" ="sucess" class="bottonSeleccionar"> Seleccionar</a>
                                                    <a href="{{ route('funcion.estado',['id'=>$dato->id,'estado'=>"InhabilitarRango"]) }}" ="sucess" class="bottonInhabilitar"> Inhabilitar rango fecha</a>
                                                <?php }else{  ?>
                                                    <a href="{{ route('funcion.estado',['id'=>$dato->id,'estado'=>"HabilitarRango"]) }}" ="sucess" class="bottonHabilitar"> Habilitar rango fecha</a>
                                                <?php  }  ?>
                                                
                                            </div>

                                            </td>
                                        </tr>  
                                    @endforeach 
                            </tbody>
                        </table>
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

