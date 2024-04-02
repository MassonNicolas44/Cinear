@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reserva de pelicula: ') }} </div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('reserva.guardarRegistro') }}">
                        @csrf



                        
                        

                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Asignar') }}
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

@include('reserva.tabla')

@endsection
