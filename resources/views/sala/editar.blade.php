@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editando la sala:') }} {{$sala->nombre}} </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sala.guardarModificacion') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{$sala->id}}"/>

                        <div class="row mb-4">
                            <label for="nombre" class="col-md-3 col-form-label text-md-end">{{ __('Nombre de la Sala') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $sala->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="cantAsiento" class="col-md-3 col-form-label text-md-end">{{ __('Cantidad de Asientos Sala') }}</label>

                            <div class="col-md-2">
                                <input id="cantAsiento" type="number" class="form-control @error('cantAsiento') is-invalid @enderror" name="cantAsiento" value="{{ $sala->cantidad_asiento }}" required autocomplete="cantAsiento" autofocus>

                                @error('cantAsiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-5">
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

<br>
<br>
<br>

@include('sala.tabla')

@endsection
