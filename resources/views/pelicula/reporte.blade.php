<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Peliculas</title>
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

        <h3 class="text-center">Peliculas registradas hasta la fecha</h3>
        <h5 class="text-right">Fecha: {{$fecha}}</h5> 
        <h5 class="text-right">Hora: {{$hora}} Hs </h5> 
        <br>
            <table class="table-bordered table-striped">
                <thead>
                    <th>Nombre</th>
                    <th>Duracion</th>
                    <th>Categoria</th>
                    <th>Nacionalidad</th>
                    <th>Idioma</th>
                    <th>Tipo</th>
                    <th>Restriccion</th>
                    <th>Precio</th>
                    <th>Estado</th>

                </thead>

                <tbody>
                    @foreach($peliculas as $pelicula)
                        <tr>
                            <td>{{$pelicula->nombre}} [{{$pelicula->año}}] </td>
                            <td>{{$pelicula->duracion}} Min</td>
                            <td>{{$pelicula->categoria->descripcion}}</td>
                            <td> [{{$pelicula->nacionalidad->sigla}}] {{$pelicula->nacionalidad->descripcion}}</td>
                            <td>{{$pelicula->idioma->descripcion}}</td>
                            <td>{{$pelicula->tipo->descripcion}}</td>
                            <td>{{$pelicula->restriccion->descripcion}}</td>
                            <td>$ {{$pelicula->precio}}</td>
                            <td>{{$pelicula->estado}}</td>
                        </tr>
                    @endforeach 
                </tbody>
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