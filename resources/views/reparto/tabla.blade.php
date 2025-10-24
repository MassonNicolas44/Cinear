<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Actores asignados a la pelicula') }} {{ $pelicula->nombre }} </div>


                <div class="card-body">

                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Actores</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($actoresPelicula as $actorPelicula)
                                        <tr>
                                            <td>{{$actorPelicula->id}}</td>
                                            <td>{{$actorPelicula->actor->nombre}} {{$actorPelicula->actor->apellido}} [{{$actorPelicula->actor->id}}]</td>
                                            <td>
                                                <div class="grupoBottones">
                                                    <a href="{{ route('reparto.eliminar',['id'=>$actorPelicula->id,'idPelicula'=>$pelicula->id]) }}"="sucess" class="bottonEliminar">Remover</a>
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
</div>