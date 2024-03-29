@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificando Datos del Actor: ') }} {{ $actor->nombre }} {{ $actor->apellido }} </div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('actor.guardarModificacion') }}">
                        @csrf


                        <input type="hidden" name="idActor" value="{{$actor->id}}"/>


                        <div class="row mb-4">
                            <label for="nombre" class="col-md-3 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-7">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $actor->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      
                        
                        <div class="row mb-4">
                            <label for="apellido" class="col-md-3 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-7">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ $actor->apellido }}" required autocomplete="apellido" autofocus>

                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="row mb-4">
                            <label for="nacionalidad" class="col-md-3 col-form-label text-md-end">{{ __('Nacionalidad') }}</label>

                            <div class="col-md-7">
                                <select id="nacionalidad" type="text" class="form-control @error('nacionalidad') is-invalid @enderror" name="nacionalidad" value="{{ $actor->nacionalidad->id }}" required autocomplete="nacionalidad" autofocus>

                                    @foreach($nacionalidades as $nacionalidad)

                                        @if($actor->nacionalidad->id==$nacionalidad->id)
                                            <option selected value="{{ $nacionalidad['id'] }}">[{{ $nacionalidad->sigla }}] {{ $nacionalidad->descripcion }} </option>
                                        @else
                                            <option value="{{ $nacionalidad['id'] }}">[{{ $nacionalidad->sigla }}] {{ $nacionalidad->descripcion }}</option>
                                        @endif

                                    @endforeach

                                </select>

                                @error('nacionalidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>        

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modificar') }}
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
