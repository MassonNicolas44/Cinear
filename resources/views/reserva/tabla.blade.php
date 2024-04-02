<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Datos Peliculas y Salas') }} </div>


                <div class="card-body">

                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Funcion</th>
                                    <th>Sala</th>
                                    <th>Pelicula</th>
                                    <th>Fecha Inicial</th>
                                    <th>Fecha Final</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($funciones as $funcion)
                                        <tr>
                                            <td>{{$funcion->id}}</td>
                                            <td>{{$funcion->sala->nombre}}</td>
                                            <td>{{$funcion->pelicula->nombre}}</td>
                                            <td>
                                                <div class="list">
                                                    <a href="{{ route('funcion.eliminar',['id'=>$funcion->id]) }}"="sucess" class="btn  btn-danger btn-sm">Remover</a>
                                                </div>
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