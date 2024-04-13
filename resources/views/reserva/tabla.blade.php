<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Datos Peliculas y Salas') }} </div>
                    <div class="card-body">                
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                            <thead>
                                <th>Sala</th>
                                <th>Pelicula</th>
                                <th>Fecha funcion</th>
                                <th>Hora funcion</th>
                                <th>Fecha de reserva</th>
                                <th>Cantidad boletos</th>
                            </thead>

                            <tbody>
                                @foreach($datosReserva as $reserva)

                                    <?php
                                        //Formateo de fecha para visualizacion mas amigable
                                        $fechaFuncion=date('d-m-Y',strtotime($reserva->fecha_funcion));
                                        $fechaReserva=date('d-m-Y',strtotime($reserva->fecha_reserva));
                                    ?>

                                    <tr>
                                        <td>{{$reserva->funcion->sala->nombre}}</td>
                                        <td>{{$reserva->funcion->pelicula->nombre}}</td>
                                        <td>{{$fechaFuncion}}</td>
                                        <td>{{$reserva->hora_funcion}}</td>
                                        <td>{{$fechaReserva}}</td>
                                        <td>{{$reserva->cantidad_boleto}}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>