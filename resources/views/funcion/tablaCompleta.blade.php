
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">{{ __('Funciones registradas') }}</div>

                @include('include.message')

                <div class="card-body">

                    {{-- Verificacion si hay datos para mostrar o no --}}
                    @if(count($funciones)>0)
<div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                            <thead>
                                <th>Id</th>
                                <th>Sala</th>
                                <th>Pelicula</th>
                                <th>Periodo</th>
                                <th>Fecha</th>

                                <?php
                                    //Array de la barra superior de los dias
                                    $nombresDiasBarra = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado","Domingo");
                                    $count = count($nombresDiasBarra);
                                    for ($i = 0; $i < $count; ++$i){
                                        ?>

                                        <th>
                                            <?php echo $nombresDiasBarra[$i]; ?>
                                        </th>

                                        <?php
                                    }
                                ?>

                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Accion</th>
                            </thead>

                            <tbody>
                                @foreach($funciones as $funcion)
                                    <tr>

                                        <?php
                                            //Formateo de fecha y hora de valores de la base de datos
                                            $fechaHoy = (new DateTime($funcion->fecha))->format('d-m-Y');
                                            $fechaInicio = (new DateTime($funcion->fechaInicio))->format('d-m-Y');
                                            $fechaFin = (new DateTime($funcion->fechaFin))->format('d-m-Y');

                                            //Comprobacion de que el horario existe le da un nuevo formato, caso contrario no hace nada - Lunes a Viernes
                                            if(isset($funcion->lvhorario1)){
                                                $lvhorario1=(new DateTime($funcion->lvhorario1))->format('H:i');
                                            }

                                            if(isset($funcion->lvhorario2)){
                                                $lvhorario2=(new DateTime($funcion->lvhorario2))->format('H:i');
                                            }

                                            if(isset($funcion->lvhorario3)){
                                                $lvhorario3=(new DateTime($funcion->lvhorario3))->format('H:i');
                                            }

                                            if(isset($funcion->lvhorario4)){
                                                $lvhorario4=(new DateTime($funcion->lvhorario4))->format('H:i');
                                            }

                                            //Comprobacion de que el horario existe le da un nuevo formato, caso contrario no hace nada - Sabado y Domingo
                                            if(isset($funcion->sdhorario1)){
                                                $sdhorario1=(new DateTime($funcion->sdhorario1))->format('H:i');
                                            }

                                            if(isset($funcion->sdhorario2)){
                                                $sdhorario2=(new DateTime($funcion->sdhorario2))->format('H:i');
                                            }

                                            if(isset($funcion->sdhorario3)){
                                                $sdhorario3=(new DateTime($funcion->sdhorario3))->format('H:i');
                                            }

                                            if(isset($funcion->sdhorario4)){
                                                $sdhorario4=(new DateTime($funcion->sdhorario4))->format('H:i');
                                            }

                                        ?>
                                        <td>{{$funcion->id}}</td>
                                        <td>{{$funcion->sala->nombre}}</td>
                                        <td>{{$funcion->pelicula->nombre}}</td>


                                        <?php

                                            //Array de la los dias para la fecha
                                            $nombresDias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado" );

                                            $fecha = (new DateTime($funcion->fecha))->format("w");
                
                                            //Traemos el nombre del dia
                                            $dia=$nombresDias[$fecha];

                                        ?>
                                        <td>{{$fechaInicio}} al {{$fechaFin}}</td>
                                        <td>{{$fechaHoy}} ({{$dia}})</td>

                                        {{-- Recorre el array NombreDias de la barra superior --}}
                                        @for ($i = 0; $i < ($count); ++$i)
                                            {{-- Verifica coincidencia entre el dia de la barra y el dia de la fecha --}}
                                            @if ($nombresDiasBarra[$i]==$dia)
                                                {{-- Verifica si el dia coincidente es dia de semana --}}
                                                @if($dia=="Lunes" || $dia=="Martes" || $dia=="Miercoles" || $dia=="Jueves" || $dia=="Viernes")
                                                    <td> 
                                                        @if(isset($funcion->lvhorario1))
                                                            {{$lvhorario1}}hs 
                                                        @endif

                                                    @if(isset($funcion->lvhorario2))
                                                            {{$lvhorario2}}hs 
                                                        @endif

                                                    @if(isset($funcion->lvhorario3))
                                                            {{$lvhorario3}}hs 
                                                        @endif

                                                    @if(isset($funcion->lvhorario4))
                                                            {{$lvhorario4}}hs 
                                                        @endif
                                                    </td>
                                                @else
                                                    <td> 
                                                    @if(isset($funcion->sdhorario1))
                                                        {{$sdhorario1}}hs 
                                                    @endif

                                                    @if(isset($funcion->sdhorario2))
                                                            {{$sdhorario2}}hs 
                                                        @endif

                                                    @if(isset($funcion->sdhorario3))
                                                            {{$sdhorario3}}hs 
                                                        @endif

                                                    @if(isset($funcion->sdhorario4))
                                                            {{$sdhorario4}}hs 
                                                        @endif
                                                    </td>
                                                @endif

                                            @else
                                                <td></td>
                                            @endif
                                        @endfor

                                        <td>{{$funcion->estado}}</td>

                                        <td>
                                            <div class="grupoBottones">
                                                <a href="{{ route('funcion.editarIndividual',['id'=>$funcion->id]) }}" ="sucess" class="bottonEditar"> Individual</a>
                                                <a href="{{ route('funcion.editarTotal',['id'=>$funcion->id]) }}" ="sucess" class="bottonEditar"> Total</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="grupoBottones">
                                                <?php if($funcion->estado=="Habilitada"){    ?>
                                                    <a href="{{ route('funcion.estado',['id'=>$funcion->id,'estado'=>"Inhabilitar"]) }}" ="sucess" class="bottonInhabilitar"> Inhabilitar</a>
                                                <?php }else{  ?>
                                                    <a href="{{ route('funcion.estado',['id'=>$funcion->id,'estado'=>"Habilitar"]) }}" ="sucess" class="bottonHabilitar"> Habilitar</a>
                                                <?php  }  ?>
                                                
                                                <a href="{{ route('funcion.eliminar',['id'=>$funcion->id]) }}"="sucess" class="bottonEliminar">Eliminar</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        </div>
                    @else
                        <h1>No hay datos para mostrar</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

