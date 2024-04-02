
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
                        </thead>

                        <tbody>
                            @foreach($datos as $dato) 
                                <tr>
                                    <td>{{$dato->sala->nombre}}</td>
                                    <td>{{$dato->pelicula->nombre}}</td>
                                </tr>  
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

