<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Datos De la reserva</title>
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

        <h3 class="text-center">Datos De la reserva</h3>
            <br>
            <?php
                $fechaFuncion=date('d-m-Y',strtotime($reserva->fecha_funcion));
                $horaFuncion=(new DateTime($reserva->hora_funcion))->format('H:i');

                $fechaReserva=date('d-m-Y',strtotime($reserva->created_at));
                $horaReserva=(new DateTime($reserva->created_at))->format('H:i');
            ?>

            <h1>Numero de Ticket: {{$reserva->id}}</h1>
            <h3>Fecha Reserva: {{$fechaReserva}}  [{{$horaReserva}} Hs]</h3>
            <h2>Pelicula: {{$reserva->funcion->pelicula->nombre}} [{{$reserva->funcion->pelicula->duracion}} Min]</h2>
            <h2>Sala: {{$reserva->funcion->sala->nombre}}</h2>
            <h3>Fecha Funcion: {{$fechaFuncion}}</h3>
            <h3>Hora Funcion: {{$horaFuncion}} Hs</h3>
            <h3>Cantidad de Boletos: {{$reserva->cantidad_boleto}}</h3>
            <h3>Precio Final: {{$reserva->precio_final}} $</h3>
    </body>
</html>