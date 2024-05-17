@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>
                @include('include.message')
                        <div class="card-body">
                            {{-- Verificacion si hay datos para mostrar o no --}}
                            @if(count($datos)>0)   
                                <tbody>
                                @foreach($datos as $dato)

                                    <form method="POST" action="{{ route('reserva.registrar') }}">
                                    @csrf
                                  
                                        @include('include.imagen')
                              
                                    </form>
                                @endforeach 
                            </tbody>
                        @else
                            <div class="mensaje">
                                Por el momento no hay peliculas
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection