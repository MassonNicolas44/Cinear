@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editando usuario') }} {{$usuario->nombre}} {{$usuario->apellido}} </div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.guardarModificacion') }}">
                        @csrf

                        <input type="hidden" name="idUsuario" value="{{$usuario->id}}"/>

                        <div class="row mb-4">
                            <label for="codigo" class="col-md-3 col-form-label text-md-end">{{ __('Codigo de ingreso') }}</label>

                            <div class="col-md-7">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ $usuario->codigo }}" required autocomplete="codigo" autofocus>

                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="nombre" class="col-md-3 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-7">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $usuario->nombre }}" required autocomplete="nombre" autofocus>

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
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ $usuario->apellido }}" required autocomplete="apellido" autofocus>

                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="dni" class="col-md-3 col-form-label text-md-end">{{ __('DNI') }}</label>

                            <div class="col-md-7">
                                <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $usuario->dni }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="telefono" class="col-md-3 col-form-label text-md-end">{{ __('Telefono') }}</label>

                            <div class="col-md-7">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $usuario->telefono }}" required autocomplete="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="direccion" class="col-md-3 col-form-label text-md-end">{{ __('Direccion') }}</label>

                            <div class="col-md-7">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $usuario->direccion }}" required autocomplete="direccion" autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="rol" class="col-md-3 col-form-label text-md-end">{{ __('Rol') }}</label>

                            <div class="col-md-7">
                                <input id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ $usuario->rol }}" required autocomplete="rol" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

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
