
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Listado de Sala y Pelicula') }}</div>

                @include('include.message')

                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                        <thead>
                            <th>Sala</th>
                            <th>Pelicula</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </thead>

                        <tbody>
                            @foreach($datos as $dato) 
                                <tr>
                                    <td>{{$dato->sala->nombre}}</td>
                                    <td>{{$dato->pelicula->nombre}}</td>
                                    <td>{{$dato->fechaInicio}}  al  {{$dato->fechaFin}}</td>
                                    <td>

                                        <?php if($dato->estado=="Habilitada"){    ?>
                                            <a href="{{ route('funcion.estado',['id'=>$dato->id,'estado'=>"InhabilitarRango"]) }}" ="sucess" class="btn btn-success btn-sm"> Inhabilitar rango fecha</a>
                                        <?php }else{  ?>
                                            <a href="{{ route('funcion.estado',['id'=>$dato->id,'estado'=>"HabilitarRango"]) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar rango fecha</a>
                                        <?php  }  ?>


                                    </td>
                                </tr>  
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

