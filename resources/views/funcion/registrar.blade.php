@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Funcion') }} </div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('funcion.guardarRegistro') }}">
                        @csrf

                        <div class="row mb-4">
                            <label for="sala" class="col-md-3 col-form-label text-md-end">{{ __('Sala') }}</label>

                            <div class="col-md-7">
                                <select id="id_Sala" type="text" class="form-control @error('id_Sala') is-invalid @enderror" name="id_Sala" value="{{ old('id_Sala') }}" required autocomplete="id_Sala" autofocus>

                                    @foreach($salas as $sala)
                                        <option value="{{ $sala['id'] }}"> {{ $sala->nombre }}  [{{ $sala->cantidad_asiento }} Asientos] </option>
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
                                <select id="id_Pelicula" type="text" class="form-control @error('id_Pelicula') is-invalid @enderror" name="id_Pelicula" value="{{ old('id_Pelicula') }}" required autocomplete="id_Pelicula" autofocus>

                                    @foreach($peliculas as $pelicula)
                                        <option value="{{ $pelicula['id'] }}"> {{ $pelicula->nombre }} [{{$pelicula->año}}]  [{{$pelicula->duracion}} Min] </option>
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

                                <input id="fechaInicio" type="date" class="form-control @error('fechaInicio') is-invalid @enderror" name="fechaInicio" value="<?php                               
                                
                                $hoy = date('Y-m-d');
                                echo date('Y-m-d',strtotime($hoy));
                                                                
                                ?>" " min="<?php echo date('Y-m-d',strtotime($hoy.' -2 week '));?>" max="<?php echo date('Y-m-d',strtotime($hoy.' +2 week '));?>" required autocomplete="fechaInicio" autofocus>

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
                                <input id="fechaFin" type="date" class="form-control @error('fechaFin') is-invalid @enderror" name="fechaFin" value="<?php                               
                                
                                $hoy = date('Y-m-d');
                                echo date('Y-m-d',strtotime($hoy));
                                                                
                                ?>" "
                                
                                min="<?php echo date('Y-m-d',strtotime($hoy));?>" max="<?php echo date('Y-m-d',strtotime($hoy.' +2 week '));?>"
                                
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
                                <select id="lvhorario1" type="time" class="form-control @error('lvhorario1') is-invalid @enderror" name="lvhorario1" value="{{ old('lvhorario1') }}" autocomplete="lvhorario1" autofocus>
                                <option value="sinAsignar"> Sin asignar </option>
                                @foreach($rangoHorario as $hora)
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                                <select id="sdhorario1" type="time" class="form-control @error('sdhorario1') is-invalid @enderror" name="sdhorario1" value="{{ old('sdhorario1') }}" autocomplete="sdhorario1" autofocus>
                                <option value="sinAsignar"> Sin asignar </option>
                                @foreach($rangoHorario as $hora)
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                            <select id="lvhorario2" type="time" class="form-control @error('lvhorario2') is-invalid @enderror" name="lvhorario2" value="{{ old('lvhorario2') }}" autocomplete="lvhorario2" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                            <select id="sdhorario2" type="time" class="form-control @error('sdhorario2') is-invalid @enderror" name="sdhorario2" value="{{ old('sdhorario2') }}" autocomplete="sdhorario2" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                            <select id="lvhorario3" type="time" class="form-control @error('lvhorario3') is-invalid @enderror" name="lvhorario3" value="{{ old('lvhorario3') }}" autocomplete="lvhorario3" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                    <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                                <select id="sdhorario3" type="time" class="form-control @error('sdhorario3') is-invalid @enderror" name="sdhorario3" value="{{ old('sdhorario3') }}" autocomplete="sdhorario3" autofocus>
                                <option value="sinAsignar"> Sin asignar </option>
                                @foreach($rangoHorario as $hora)
                                        
                                        <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                            <select id="lvhorario4" type="time" class="form-control @error('lvhorario4') is-invalid @enderror" name="lvhorario4" value="{{ old('lvhorario4') }}" autocomplete="lvhorario4" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                    <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                            <select id="sdhorario4" type="time" class="form-control @error('sdhorario4') is-invalid @enderror" name="sdhorario4" value="{{ old('sdhorario4') }}" autocomplete="sdhorario4" autofocus>
                            <option value="sinAsignar"> Sin asignar </option>
                            @foreach($rangoHorario as $hora)
                                    
                                    <option value="{{ $hora->format("H:i") . PHP_EOL }}"> {{ $hora->format("H:i") . PHP_EOL }} </option>
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
                                    {{ __('Registrar Sala') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection