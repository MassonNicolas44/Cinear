
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Tipos de animaciones registradas') }}</div>

                @include('include.message')

                <div class="card-body">

                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Tipo de Pelicula</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($tipos as $tipo)
                                        <tr>
                                            <td>{{$tipo->id}}</td>
                                            <td>{{$tipo->descripcion}}</td>
                                            <td>
                                                <div class="grupoBottones">
                                                    <a href="{{ route('tipo.editar',['id'=>$tipo->id]) }}" ="sucess" class="bottonEditar"> Editar</a>
                                                    <a href="{{ route('tipo.eliminar',['id'=>$tipo->id]) }}"="sucess" class="bottonEliminar">Eliminar</a>
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
