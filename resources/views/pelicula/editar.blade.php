@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificando Datos de la Pelicula: ') }} {{ $pelicula->nombre }} </div>

                <div class="container-avatar">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('pelicula.guardarModificacion') }}">
                        @csrf


                        <input type="hidden" name="idPelicula" value="{{$pelicula->id}}"/>

                        <div class="row mb-4">
                            <label for="nombre" class="col-md-3 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-7">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $pelicula->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        <div class="row mb-4">
                            <label for="año" class="col-md-3 col-form-label text-md-end">{{ __('Año') }}</label>

                            <div class="col-md-7">
                                <input id="año" type="number" class="form-control @error('año') is-invalid @enderror" name="año" value="{{ $pelicula->año }}" required autocomplete="año" autofocus>

                                @error('año')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="row mb-4">
                            <label for="descripcion" class="col-md-3 col-form-label text-md-end">{{ __('Descripcion') }}</label>

                            <div class="col-md-7">
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ $pelicula->descripcion }}" required autocomplete="descripcion" autofocus>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>      
                        
                        
                        <div class="row mb-4">
                            <label for="categoria" class="col-md-3 col-form-label text-md-end">{{ __('Categoria') }}</label>

                            <div class="col-md-7">
                                <select id="categoria" type="text" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ $pelicula->categoria }}" required autocomplete="categoria" autofocus>

                                    @foreach($categorias as $categoria)
                                        @if($pelicula->categoria->id==$categoria->id)
                                            <option selected value="{{ $categoria['id'] }}">{{ $categoria->descripcion }}</option>
                                        @else
                                            <option value="{{ $categoria['id'] }}">{{ $categoria->descripcion }}</option>
                                        @endif
                                    @endforeach

                                </select>

                                @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  


                        <div class="row mb-4">
                            <label for="nacionalidad" class="col-md-3 col-form-label text-md-end">{{ __('Nacionalidad') }}</label>

                            <div class="col-md-7">
                                <select id="nacionalidad" type="text" class="form-control @error('nacionalidad') is-invalid @enderror" name="nacionalidad" value="{{ $pelicula->nacionalidad }}" required autocomplete="nacionalidad" autofocus>

                                    @foreach($nacionalidades as $nacionalidad)

                                        @if($pelicula->nacionalidad->id==$nacionalidad->id)
                                            <option selected value="{{ $nacionalidad['id'] }}">[{{ $nacionalidad->sigla }}] {{ $nacionalidad->descripcion }}</option>
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


                        <div class="row mb-4">
                            <label for="idioma" class="col-md-3 col-form-label text-md-end">{{ __('Idioma') }}</label>

                            <div class="col-md-7">
                                <select id="idioma" type="text" class="form-control @error('idioma') is-invalid @enderror" name="idioma" value="{{ $pelicula->idioma }}" required autocomplete="idioma" autofocus>

                                    @foreach($idiomas as $idioma)
                                    
                                        @if($pelicula->idioma->id==$idioma->id)
                                            <option selected value="{{ $idioma['id'] }}">{{ $idioma->descripcion }}</option>
                                        @else
                                            <option value="{{ $idioma['id'] }}">{{ $idioma->descripcion }}</option>
                                        @endif

                                    @endforeach

                                </select>

                                @error('idioma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="row mb-4">
                            <label for="tipo" class="col-md-3 col-form-label text-md-end">{{ __('Tipo') }}</label>

                            <div class="col-md-7">
                                <select id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ $pelicula->tipo }}" required autocomplete="tipo" autofocus>

                                    @foreach($tipos as $tipo)

                                        @if($pelicula->idioma->id==$idioma->id)
                                            <option selected value="{{ $tipo['id'] }}">{{ $tipo->descripcion }}</option>
                                        @else
                                            <option value="{{ $tipo['id'] }}">{{ $tipo->descripcion }}</option>
                                        @endif

                                    @endforeach

                                </select>

                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="row mb-4">
                            <label for="restriccion" class="col-md-3 col-form-label text-md-end">{{ __('Restriccion') }}</label>

                            <div class="col-md-7">
                                <select id="restriccion" type="text" class="form-control @error('restriccion') is-invalid @enderror" name="restriccion" value="{{ $pelicula->restriccion }}" required autocomplete="restriccion" autofocus>

                                    @foreach($restricciones as $restriccion)

                                        @if($pelicula->idioma->id==$idioma->id)
                                            <option selected value="{{ $restriccion['id'] }}">{{ $restriccion->descripcion }}</option>
                                        @else
                                            <option value="{{ $restriccion['id'] }}">{{ $restriccion->descripcion }}</option>
                                        @endif

                                    @endforeach

                                </select>

                                @error('restriccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="row mb-4">
                            <label for="precio" class="col-md-3 col-form-label text-md-end">{{ __('Precio ($)') }}</label>

                            <div class="col-md-7">
                                <input id="precio" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ $pelicula->precio }}" required autocomplete="precio" autofocus>

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        <div class="row mb-4">
                            <label for="imagen" class="col-md-3 col-form-label text-md-end">{{ __('Imagen') }}</label>

                            <div class="col-md-7">
                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ $pelicula->image_path }}" autocomplete="imagen" autofocus>

                                </br>
                                <img src="{{ asset('../storage/app/imagenes/' . $pelicula->image_path) }}" width="60%" >

                                <div class="clearfix"></div>

                                @error('imagen')
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
