<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Ventas</title>
</head>

    <style>  

    table{
        width: 100%;
        text-align:center;
    }

    th {
        font-size:15px;
    }

    td {
        font-size:13px;
    }

    </style>

    <body>

        <h3 class="text-center">Ventas</h3>
        <h5 class="text-right">Fecha: {{$fecha}}</h5> 
        <h5 class="text-right">Hora: {{$hora}} Hs </h5> 
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Sala</th>
                                    <th>Pelicula</th>
                                    <th>Fecha funcion</th>
                                    <th>Hora funcion</th>
                                    <th>Fecha de reserva</th>
                                    <th>Cantidad boletos</th>
                                    <th>Precio Final</th>
                                </thead>

                                <tbody>
                                    @foreach($arrayReserva as $reserva)

                                        <?php
                                            //Formateo de fecha para visualizacion mas amigable
                                            $fechaFuncion=date('d-m-Y',strtotime($reserva->fecha_funcion));
                                            $horaFuncion=(new DateTime($reserva->hora_funcion))->format('H:i');

                                            $fechaReserva=date('d-m-Y',strtotime($reserva->created_at));
                                            $horaReserva=(new DateTime($reserva->created_at))->format('H:i');
                                        ?>

                                        <tr>
                                            <td>{{$reserva->id}}</td>
                                            <td>{{$reserva->funcion->sala->nombre}}</td>
                                            <td>{{$reserva->funcion->pelicula->nombre}}</td>
                                            <td>{{$fechaFuncion}}</td>
                                            <td>{{$horaFuncion}} Hs</td>
                                            <td>{{$fechaReserva}}  [{{$horaReserva}} Hs]</td>
                                            <td>{{$reserva->cantidad_boleto}}</td>
                                            <td>{{$reserva->precio_final}} $</td>
                                        </tr>
                                    @endforeach 
                                </tbody>

                                <td COLSPAN=6>Ventas Totales</td>
                                <td>{{$totalBoletos}} Boletos</td>
                                <td>{{$totalPrecio}} $</td>

                            </table>

            <script type="text/php">
                if ( isset($pdf) ) {
                    $pdf->page_script('
                        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                        $pdf->text(270, 780, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
                    ');
                }
        </script>
    </body>
</html>