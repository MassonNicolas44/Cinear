@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <?php
                //Formateo de fecha
                $fecha = date('d-m-Y',strtotime($funcion->fecha));
                ?>

                <div class="card-header"> Editando la sala "{{$funcion->sala->nombre}}" y pelicula "{{$funcion->pelicula->nombre}}" del {{$fecha}} </div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('funcion.guardarModificacionTotal') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{$funcion->id}}"/>
                        <input type="hidden" name="id_Sala" value="{{$funcion->id_Sala}}"/>
                        <input type="hidden" name="id_Pelicula" value="{{$funcion->id_Pelicula}}"/>

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
                                
                                required autocomplete="fechaInicio" autofocus>

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
                                
                                required autocomplete="fechaFin" autofocus>

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
                                <select id="lvhorario1" type="time" class="form-control @error('lvhorario1') is-invalid @enderror" name="lvhorario1" value="{{ $funcion->lvhorario1 }}" autocomplete="lvhorario1" autofocus>
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
                                <select id="sdhorario1" type="time" class="form-control @error('sdhorario1') is-invalid @enderror" name="sdhorario1" value="{{ $funcion->sdhorario1 }}" autocomplete="sdhorario1" autofocus>
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
                            <select id="lvhorario2" type="time" class="form-control @error('lvhorario2') is-invalid @enderror" name="lvhorario2" value="{{ $funcion->lvhorario2 }}" autocomplete="lvhorario2" autofocus>
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
                            <select id="sdhorario2" type="time" class="form-control @error('sdhorario2') is-invalid @enderror" name="sdhorario2" value="{{ $funcion->sdhorario2 }}" autocomplete="sdhorario2" autofocus>
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
                            <select id="lvhorario3" type="time" class="form-control @error('lvhorario3') is-invalid @enderror" name="lvhorario3" value="{{ $funcion->lvhorario3 }}" autocomplete="lvhorario3" autofocus>
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
                                <select id="sdhorario3" type="time" class="form-control @error('sdhorario3') is-invalid @enderror" name="sdhorario3" value="{{ $funcion->sdhorario3 }}" autocomplete="sdhorario3" autofocus>
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
                            <select id="lvhorario4" type="time" class="form-control @error('lvhorario4') is-invalid @enderror" name="lvhorario4" value="{{ $funcion->lvhorario4 }}" autocomplete="lvhorario4" autofocus>
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
                            <select id="sdhorario4" type="time" class="form-control @error('sdhorario4') is-invalid @enderror" name="sdhorario4" value="{{ $funcion->sdhorario4 }}" autocomplete="sdhorario4" autofocus>
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

                        <button type="submit" class="bottonModificar">
                            {{ __('Guardar modificacion') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection