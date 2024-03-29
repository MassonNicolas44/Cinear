@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificando la Nacionalidad: ') }} "{{ $nacionaliadd->descripcion }}" </div>

                @include('include.message')

                <div class="card-body">
                    <form method="POST" action="{{ route('nacionalidad.guardarModificacion') }}">
                        @csrf


                        <input type="hidden" name="idNacionalidad" value="{{$nacionalidad->id}}"/>


                        <div class="row mb-4">
                            <label for="descripcion" class="col-md-3 col-form-label text-md-end">{{ __('Nuevo nombre') }}</label>

                            <div class="col-md-7">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $nacionalidad->descripcion }}" required autocomplete="descripcion" autofocus>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="sigla" class="col-md-3 col-form-label text-md-end">{{ __('Sigla') }}</label>

                            <div class="col-md-7">
                                <input id="sigla" type="text" class="form-control @error('sigla') is-invalid @enderror" name="sigla" value="{{ $nacionalidad->sigla }}" required autocomplete="sigla" autofocus>

                                @error('sigla')
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
