<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">{{ __('Listado de Salas') }}</div>

                @include('include.message')

                <div class="card-body">
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
                                                <div class="list">

                                                    <a href="{{ route('sala.editar',['id'=>$sala->id]) }}" ="sucess" class="btn btn-warning btn-sm"> Editar</a>

                                                    <?php if($sala->estado=="Habilitada"){    ?>
                                                        <a href="{{ route('sala.estado',['id'=>$sala->id,'estado'=>"Inhabilitar"]) }}" ="sucess" class="btn btn-success btn-sm"> Inhabilitar</a>
                                                    <?php }else{  ?>
                                                        <a href="{{ route('sala.estado',['id'=>$sala->id,'estado'=>"Habilitar"]) }}" ="sucess" class="btn btn-success btn-sm"> Habilitar</a>
                                                    <?php  }  ?>
                                                                                                        
                                                    <a href="{{ route('sala.eliminar',['id'=>$sala->id]) }}"="sucess" class="btn  btn-danger btn-sm">Eliminar</a>
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