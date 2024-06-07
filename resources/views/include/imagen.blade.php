
<div class="card_pub_image">
        
    <div class="card-body">
        <div class="imagenPelicula">
                <img src="{{ asset('../storage/app/imagenes/'.$dato->pelicula->image_path)}}" >
        </div>
        <div class="trailerPelicula">

            <?php
                //Metodo para obtener el Id del video, para ser mostrado en la vista
                $url=explode("=",$dato->pelicula->url);
                $id=$url[1];
            ?>

            <iframe src="https://www.youtube.com/embed/<?php echo $id ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>


        
        <div class="detallePelicula">    
            
            <?php
                //Formateo de fecha para visualizacion mas amigable
                $fechaInicio=date('d-m-Y',strtotime($dato->fechaInicio));
                $fechaFin=date('d-m-Y',strtotime($dato->fechaFin));

                $min=date('Y-m-d',strtotime($dato->fechaInicio));
                $max=date('Y-m-d',strtotime($dato->fechaFin));

                $hoy = date('Y-m-d');

            ?>


            <ul>

                <li><b>Pelicula:</b>{{$dato->pelicula->nombre}}</li>
                <li><b>Duracion: </b>{{$dato->pelicula->duracion}} Minutos</li>
                <li><b>Descripcion: </b>{{$dato->pelicula->descripcion}}</li>
                <li><b>Categoria: </b>{{$dato->pelicula->categoria->descripcion}}</li>
                <li><b>Tipo: </b>{{$dato->pelicula->tipo->descripcion}}</li>
                <li><b>Restriccion Edad: </b>{{$dato->pelicula->restriccion->descripcion}}</li>
                <li><b>Idioma: </b>{{$dato->pelicula->idioma->descripcion}}</li>
                <li><b>Nacionalidad: </b>{{$dato->pelicula->nacionalidad->descripcion}}</li>
                <li><b>Precio: </b>{{$dato->pelicula->precio}} $</li>
                <li><b>Fecha desde </b>{{$fechaInicio}}<b> hasta </b>{{$fechaFin}}</li>

                <li>
                    <div style="display:flex;align-items: center;">
                        Seleccionar la fecha: 

                        <div class="col-md-5" style="margin-left:10px;">
                            <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{$hoy}}"
                            
                            min="<?php echo $hoy;?>" 
                            
                            max="<?php echo $max;?>"
                            
                            required autocomplete="fecha" autofocus>

                            @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </li>

            </ul>


            <input type="hidden" name="idPelicula" value="{{$dato->pelicula->id}}"/>
            <input type="hidden" name="idSala" value="{{$dato->sala->id}}"/>
            <button type="submit" class="bottonInicioSeleccionar">
                {{ __('Ver mas detalles') }}
            </button>

        </div>
    </div>
</div>
