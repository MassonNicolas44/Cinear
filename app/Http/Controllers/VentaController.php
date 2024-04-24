<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Models\Reserva;
use App\Models\Funcion;
use App\Models\Pelicula;
use App\Models\Sala;

class VentaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function listado(Request $request)
    {

        //Trae la lista de peliculas y salas habilitada
        $peliculas=Pelicula::all();
        $salas=Sala::where("estado","Habilitada")->get();

        //Se obtienen los valores
        $peliculaBuscar=$request->input('id_Pelicula');
        $salaBuscar=$request->input('id_Sala');
        $fechaFuncionBuscar=$request->input('fechaFuncion');
        $fechaReservaBuscar=$request->input('fechaReserva');

        //Trae la lista de funciones filtrando por la pelicula y/o sala a buscar
        $funciones=Funcion::where('id_Pelicula','LIKE',$peliculaBuscar)
                    ->where('id_Sala','LIKE',$salaBuscar)
                    ->orderby('id','asc')
                    ->get();

        //Inicializo array para guardar las reservas con las filtraciones indicadas, para ser moestradas en la tabla
        $arrayReserva=array();

        //Recorre las funciones recuperadas anteriormente
        foreach($funciones as $funcion){

            //Si busca por fecha de reserva, la consulta del Where debe ser WhereDate por el formato del created_at
            if(empty($fechaReservaBuscar)){
                //Trae la lista de reservas filtrando por las funciones buscadas anteriormente, agregandole el filtrado por fecha de funcion y/o fecha de reserva
                $reservas=Reserva::where('id_Funcion','LIKE',$funcion->id)
                ->where('fecha_funcion','LIKE',$fechaFuncionBuscar)
                ->get();

            }else{
                //Trae la lista de reservas filtrando por las funciones buscadas anteriormente, agregandole el filtrado por fecha de funcion y/o fecha de reserva
                $reservas=Reserva::where('id_Funcion','LIKE',$funcion->id)
                ->where('fecha_funcion','LIKE',$fechaFuncionBuscar)
                ->whereDate('created_at','LIKE',$fechaReservaBuscar)
                ->get();
            }
            
            //Comprobacion de que el objeto recuperado tiene contenido
            if(count($reservas)>0){

                //Recorre los objetos recuperados, añandiendo cada uno al array de reserva
                foreach($reservas as $reserva){
                    array_push($arrayReserva, $reserva);
                }
            }
        }     

        //Reordeno el array por id de manera descendiente
        sort($arrayReserva);
   
        $totalBoletos=0;
        $totalPrecio=0;

        //Guardamos la cantidad total de ventas en precio y cantidad de boletos
        foreach($arrayReserva as $contador){
            $totalBoletos=$totalBoletos+($contador->cantidad_boleto);
            $totalPrecio=$totalPrecio+($contador->precio_final);
        }

        //Retorna a la vista las reservas registradas
        return view('venta.listado',['arrayReserva'=>$arrayReserva,'peliculas'=>$peliculas,'salas'=>$salas,'totalBoletos'=>$totalBoletos,'totalPrecio'=>$totalPrecio]);

    }

}
