<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Salas registradas') }}</div>

                @include('include.message')

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                                <thead>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Cantidad de Asientos</th>
                                    <th>Accion</th>
                                </thead>

                                <tbody>
                                    @foreach($salas as $sala)
                                        <tr>
                                            <td>{{$sala->id}}</td>
                                            <td>{{$sala->nombre}}</td>
                                            <td>{{$sala->cantidad_asiento}}</td>
                                            <td>{{$sala->estado}}</td>
                                            <td>
                                                <div class="grupoBottones">

                                                    <a href="{{ route('sala.editar',['id'=>$sala->id]) }}" ="sucess" class="bottonEditar"> Editar</a>

                                                    <?php if($sala->estado=="Habilitada"){    ?>
                                                        <a href="{{ route('sala.estado',['id'=>$sala->id,'estado'=>"Inhabilitar"]) }}" ="sucess" class="bottonInhabilitar"> Inhabilitar</a>
                                                    <?php }else{  ?>
                                                        <a href="{{ route('sala.estado',['id'=>$sala->id,'estado'=>"Habilitar"]) }}" ="sucess" class="bottonHabilitar"> Habilitar</a>
                                                    <?php  }  ?>
                                                                                                        
                                                    <a href="{{ route('sala.eliminar',['id'=>$sala->id]) }}"="sucess" class="bottonEliminar">Eliminar</a>
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