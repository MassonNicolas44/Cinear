@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <?php
                //Formateo de fecha
                $fecha = date('d-m-Y',strtotime($funcion->fecha));


                //Si es dia de semana se habilitan solo los horarios de Lunes a Viernes, caso contrario, seran solo los Sabado y Domingo

                //Array de la los dias para la fecha
                $nombresDias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado" );

                $fechaNombreDia = (new DateTime($funcion->fecha))->format("w");

                //Traemos el nombre del dia
                $dia=$nombresDias[$fechaNombreDia];
                ?>


                <div class="card-header"> Editando la sala "{{$funcion->sala->nombre}}" y pelicula "{{$funcion->pelicula->nombre}}" del {{$fecha}} </div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('funcion.guardarModificacionIndividual') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{$funcion->id}}"/>
                        <input type="hidden" name="id_Sala" value="{{$funcion->sala->id}}"/>
                        <input type="hidden" name="id_Pelicula" value="{{$funcion->pelicula->id}}"/>

                        <div class="row mb-4">
                            <label for="sala" class="col-md-3 col-form-label text-md-end">{{ __('Sala') }}</label>

                            <div class="col-md-7">
                                <select id="id_Sala" disabled type="text" class="form-control @error('id_Sala') is-invalid @enderror" name="id_Sala" value="{{ $funcion->id_Sala }}" required autocomplete="id_Sala" autofocus>

                                    @foreach($salas as $sala)
                                        @if($funcion->id_Sala==$sala->id)
                                            <option selected value="{{ $sala['id'] }}"> {{ $sala->nombre }}  [{{ $sala->cantidad_asiento }} Asientos] </option>
                                        @else
                                            <option value="{{ $sala['id'] }}"> {{ $sala->nombre }}  [{{ $sala->cantidad_asiento }} Asientos] </option>
                                        @endif
                                    @endforeach

                                </select>

                                @error('id_Sala')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="row mb-4">
                            <label for="pelicula" class="col-md-3 col-form-label text-md-end">{{ __('Pelicula') }}</label>

                            <div class="col-md-7">
                                <select id="id_Pelicula" disabled type="text" class="form-control @error('id_Pelicula') is-invalid @enderror" name="id_Pelicula" value="{{ $funcion->id_Pelicula }}" required autocomplete="id_Pelicula" autofocus>

                                    @foreach($peliculas as $pelicula)
                                        @if($funcion->id_Pelicula==$pelicula->id)
                                            <option selected value="{{ $pelicula['id'] }}"> {{ $pelicula->nombre }} [{{$pelicula->año}}]  [{{$pelicula->duracion}} Min] </option>
                                        @else
                                            <option value="{{ $pelicula['id'] }}"> {{ $pelicula->nombre }} [{{$pelicula->año}}]  [{{$pelicula->duracion}} Min] </option>
                                        @endif
                                    @endforeach

                                </select>

                                @error('id_Pelicula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      
                        
                        <div class="row mb-4">
                            <label for="fechaInicio" class="col-md-3 col-form-label text-md-end">{{ __('Fecha Inicio') }}</label>

                            <div class="col-md-3">

                                <input id="fechaInicio" type="date" class="form-control @error('fechaInicio') is-invalid @enderror" name="fechaInicio" value="{{$funcion->fechaInicio}}" 
                                
                                min="<?php echo date('Y-m-d',strtotime($funcion->fechaInicio.' -2 week '));?>" 
                                
                                max="<?php echo date('Y-m-d',strtotime($funcion->fechaInicio.' +2 week '));?>" 
                                
                                required autocomplete="fechaInicio" disabled autofocus>

                                @error('fechaInicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="row mb-4">
                            <label for="fechaFin" class="col-md-3 col-form-label text-md-end">{{ __('Fecha Fin') }}</label>

                            <div class="col-md-3">
                                <input id="fechaFin" type="date" class="form-control @error('fechaFin') is-invalid @enderror" name="fechaFin" value="{{$funcion->fechaFin}}"
                                
                                min="<?php echo date('Y-m-d',strtotime($funcion->fechaInicio));?>" 
                                
                                max="<?php echo date('Y-m-d',strtotime($funcion->fechaFin.' +2 week '));?>"
                                
                                required autocomplete="fechaFin" disabled autofocus>

                                @error('fechaFin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        
                        <div class="row mb-4">
                            <label for="lunesViernes" class="col-md-3 col-form-label text-md-end">{{ __('Lunes a Viernes') }}</label>
                            <label for="sabadoDomingo" class="col-md-5 col-form-label text-md-end">{{ __('Sabado y Domingo') }}</label>
                        </div>   


                        <div class="row mb-4">
                            <label for="lvhorario1" class="col-md-3 col-form-label text-md-end">{{ __('Horario 1') }}</label>

                            <div class="col-md-2">
                                <select id="lvhorario1" 

                                <?php                                
                                    if($dia=="Sábado" || $dia=="Domingo" ){
                                        ?> disabled <?php
                                    }else{
                                        ?> enabled <?php
                                    }
                                ?>

                                type="time" class="form-control @error('lvhorario1') is-invalid @enderror" name="lvhorario1" value="{{ $funcion->lvhorario1 }}" autocomplete="lvhorario1" autofocus>
                                <option value="sinAsignar"> Sin asignar </option>
                              
                                @foreach($rangoHorario as $hora)

                                    <?php
                                    //Formateo de las fechas para luego comprobar los valores individuales
                                    $hora1 = strtotime( $funcion->lvhorario1 );
                                    $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif

                                @endforeach

                                </select>

                                @error('lvhorario1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <label for="sdhorario1" class="col-md-3 col-form-label text-md-end">{{ __('Horario 1') }}</label>

                            <div class="col-md-2">
                                <select id="sdhorario1" 
                                
                                <?php                                
                                    if($dia=="Sábado" || $dia=="Domingo" ){
                                        ?> enabled <?php
                                    }else{
                                        ?> disabled <?php
                                    }
                                ?>

                                type="time" class="form-control @error('sdhorario1') is-invalid @enderror" name="sdhorario1" value="{{ $funcion->sdhorario1 }}" autocomplete="sdhorario1" autofocus>
                                <option value="sinAsignar"> Sin asignar </option>
                                @foreach($rangoHorario as $hora)

                                    <?php
                                        //Formateo de las fechas para luego comprobar los valores individuales
                                        $hora1 = strtotime( $funcion->sdhorario1 );
                                        $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif

                                @endforeach
                                </select>

                                @error('sdhorario1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>   

                        <div class="row mb-4">
                            <label for="lvhorario2" class="col-md-3 col-form-label text-md-end">{{ __('Horario 2') }}</label>

                            <div class="col-md-2">
                            <select id="lvhorario2" 
                            
                            <?php                                
                                if($dia=="Sábado" || $dia=="Domingo" ){
                                    ?> disabled <?php
                                }else{
                                    ?> enabled <?php
                                }
                            ?>

                            type="time" class="form-control @error('lvhorario2') is-invalid @enderror" name="lvhorario2" value="{{ $funcion->lvhorario2 }}" autocomplete="lvhorario2" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                     <?php
                                        //Formateo de las fechas para luego comprobar los valores individuales
                                        $hora1 = strtotime( $funcion->lvhorario2 );
                                        $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif

                            @endforeach
                            </select>
                                @error('lvhorario2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="sdhorario2" class="col-md-3 col-form-label text-md-end">{{ __('Horario 2') }}</label>

                            <div class="col-md-2">
                            <select id="sdhorario2" 
                            
                            <?php                                
                                if($dia=="Sábado" || $dia=="Domingo" ){
                                    ?> enabled <?php
                                }else{
                                    ?> disabled <?php
                                }
                            ?>
                            
                            type="time" class="form-control @error('sdhorario2') is-invalid @enderror" name="sdhorario2" value="{{ $funcion->sdhorario2 }}" autocomplete="sdhorario2" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                    <?php
                                        //Formateo de las fechas para luego comprobar los valores individuales
                                        $hora1 = strtotime( $funcion->sdhorario2 );
                                        $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif

                            @endforeach
                            </select>
                                @error('sdhorario2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div> 

                        <div class="row mb-4">
                            <label for="lvhorario3" class="col-md-3 col-form-label text-md-end">{{ __('Horario 3') }}</label>

                            <div class="col-md-2">
                            <select id="lvhorario3" 
                            
                            <?php                                
                                if($dia=="Sábado" || $dia=="Domingo" ){
                                    ?> disabled <?php
                                }else{
                                    ?> enabled <?php
                                }
                            ?>
                            
                            type="time" class="form-control @error('lvhorario3') is-invalid @enderror" name="lvhorario3" value="{{ $funcion->lvhorario3 }}" autocomplete="lvhorario3" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                    <?php
                                        //Formateo de las fechas para luego comprobar los valores individuales
                                        $hora1 = strtotime( $funcion->lvhorario3 );
                                        $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif
                                    
                            @endforeach
                            </select>
                                @error('lvhorario3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="sdhorario3" class="col-md-3 col-form-label text-md-end">{{ __('Horario 3') }}</label>

                                <div class="col-md-2">
                                <select id="sdhorario3" 
                                
                                <?php                                
                                    if($dia=="Sábado" || $dia=="Domingo" ){
                                        ?> enabled <?php
                                    }else{
                                        ?> disabled <?php
                                    }
                                ?>
                                
                                type="time" class="form-control @error('sdhorario3') is-invalid @enderror" name="sdhorario3" value="{{ $funcion->sdhorario3 }}" autocomplete="sdhorario3" autofocus>
                                <option value="sinAsignar"> Sin asignar </option>
                                @foreach($rangoHorario as $hora)
                                        
                                        <?php
                                        //Formateo de las fechas para luego comprobar los valores individuales
                                        $hora1 = strtotime( $funcion->sdhorario3 );
                                        $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif
                                       
                                @endforeach
                                </select>
                                    @error('sdhorario3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div> 

                        <div class="row mb-4">
                            <label for="lvhorario4" class="col-md-3 col-form-label text-md-end">{{ __('Horario 4') }}</label>

                            <div class="col-md-2">
                            <select id="lvhorario4" 
                            
                            <?php                                
                                if($dia=="Sábado" || $dia=="Domingo" ){
                                    ?> disabled <?php
                                }else{
                                    ?> enabled <?php
                                }
                            ?>
                            
                            type="time" class="form-control @error('lvhorario4') is-invalid @enderror" name="lvhorario4" value="{{ $funcion->lvhorario4 }}" autocomplete="lvhorario4" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                    <?php
                                        //Formateo de las fechas para luego comprobar los valores individuales
                                        $hora1 = strtotime( $funcion->lvhorario4 );
                                        $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif
                                    
                            @endforeach
                            </select>
                                @error('lvhorario4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="sdhorario4" class="col-md-3 col-form-label text-md-end">{{ __('Horario 4') }}</label>

                            <div class="col-md-2">
                            <select id="sdhorario4" 
                            
                            <?php                                
                                if($dia=="Sábado" || $dia=="Domingo" ){
                                    ?> enabled <?php
                                }else{
                                    ?> disabled <?php
                                }
                            ?>
                            
                            type="time" class="form-control @error('sdhorario4') is-invalid @enderror" name="sdhorario4" value="{{ $funcion->sdhorario4 }}" autocomplete="sdhorario4" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                    <?php
                                        //Formateo de las fechas para luego comprobar los valores individuales
                                        $hora1 = strtotime( $funcion->sdhorario4 );
                                        $hora2 = strtotime( $hora->format("H:i"). PHP_EOL);
                                    ?>

                                    @if($hora1==$hora2)
                                        <option selected value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @else
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
                                    @endif
                                    
                            @endforeach
                            </select>
                                @error('sdhorario4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div> 

                        <br>

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar Sala') }}
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">

                <div class="card-header">{{ __('Listado de Funciones') }}</div>

                <div class="card-body">

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

                                            <td>
                                                <div class="list">
                                                    <a href="{{ route('funcion.editarIndividual',['id'=>$funcion->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar Individual</a>
                                                    <a href="{{ route('funcion.editarTotal',['id'=>$funcion->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar Total</a>
                                                    <a href="{{ route('funcion.eliminar',['id'=>$funcion->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar</a>
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
