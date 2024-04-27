@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editando contraseña') }}</div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.guardarModificacionContraseña') }}">
                        @csrf

                        <label class="col-md-3 col-form-label text-md-end">{{ __('Ingrese los siguientes datos') }}</label>

                        <div class="row mb-4">
                            <label for="contraseña_actual" class="col-md-3 col-form-label text-md-end">{{ __('Contraseña actual') }}</label>

                            <div class="col-md-7">
                                <input id="contraseña_actual" type="password" class="form-control @error('contraseña_actual') is-invalid @enderror" name="contraseña_actual" required autocomplete="contraseña_actual">

                                @error('contraseña_actual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>     
                        
                        <div class="row mb-4">
                            <label for="contraseña_nueva" class="col-md-3 col-form-label text-md-end">{{ __('Nueva contraseña') }}</label>

                            <div class="col-md-7">
                                <input id="contraseña_nueva" type="password" class="form-control @error('contraseña_nueva') is-invalid @enderror" name="contraseña_nueva" required autocomplete="contraseña_nueva">

                                @error('contraseña_nueva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    

                        <div class="row mb-4">
                            <label for="contraseña_confirmacion" class="col-md-3 col-form-label text-md-end">{{ __('Reingrese la nueva contraseña') }}</label>

                            <div class="col-md-7">
                                <input id="contraseña_confirmacion" type="password" class="form-control @error('contraseña_confirmacion') is-invalid @enderror" name="contraseña_confirmacion" required autocomplete="contraseña_confirmacion">

                                @error('contraseña_confirmacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Finalizar') }}
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
