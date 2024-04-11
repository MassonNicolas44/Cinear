<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;

use App\Models\Funcion;
use App\Models\Pelicula;
use App\Models\Reserva;

class ReservaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registrar(Request $request)
    {

        $id=$request->input('id');
        $fecha=$request->input('fecha');

        //Trae la lista de funciones con la fecha seleccionada de la pelicula seleccionada desde la Base de Datos
        $funciones=Funcion::where('id_Pelicula',$id)
        ->where('fecha',$fecha)
        ->orderby('id_Pelicula','asc')->get();


        $horarios=array();

   
        foreach($funciones as $aa){

            if(!empty($aa->lvhorario1)){
                $lvhorario1=(new DateTime($aa->lvhorario1))->format('H:i');
                array_push($horarios, $lvhorario1 );
            }
            if(!empty($aa->lvhorario2)){
                $lvhorario2=(new DateTime($aa->lvhorario2))->format('H:i');
                array_push($horarios, $lvhorario2 );
            }
            if(!empty($aa->lvhorario3)){
                $lvhorario3=(new DateTime($aa->lvhorario3))->format('H:i');
                array_push($horarios, $lvhorario3 );
            }
            if(!empty($aa->lvhorario4)){
                $lvhorario4=(new DateTime($aa->lvhorario4))->format('H:i');
                array_push($horarios, $lvhorario4 );
            }



            if(!empty($aa->sdhorario1)){
                $sdhorario1=(new DateTime($aa->sdhorario1))->format('H:i');
                array_push($horarios, $sdhorario1 );
            }
            if(!empty($aa->sdhorario2)){
                $sdhorario2=(new DateTime($aa->sdhorario2))->format('H:i');
                array_push($horarios, $sdhorario2 );
            }
            if(!empty($aa->sdhorario3)){
                $sdhorario3=(new DateTime($aa->sdhorario3))->format('H:i');
                array_push($horarios, $sdhorario3 );
            }
            if(!empty($aa->sdhorario4)){
                $sdhorario4=(new DateTime($aa->sdhorario4))->format('H:i');
                array_push($horarios, $sdhorario4 );
            }

            //Guardo el id de la funcion para luego utilizarlo en la busqueda de reserva
            $idFuncion=$aa->id;
        }


        if(empty($horarios)){
            array_push($horarios, "Sin Horario" );
        }

        //Trae la pelicula seleccionada
        $pelicula=Pelicula::select('nombre')->where('id',$id)->first();

        //Formateo de fecha para visualizacion mas amigable
        $fecha=date('d-m-Y',strtotime($fecha));

        //Trae la lista de reservas para la pelicula, sala y fecha seleccionada
        $datosReserva=Reserva::select('*')->where('id_Funcion',$idFuncion)->orderBy('hora','asc')->get();
        
        //Retorna a la vista, las funciones habilitadas para esa fecha en particular
        return view('reserva.registrar',['funciones'=>$funciones,'pelicula'=>$pelicula,'fecha'=>$fecha,'horarios'=>$horarios,'datosReserva'=>$datosReserva]);
    }


    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'idFuncion' => ['required'],
        'horario' => ['required'],
        'cantBoleto' => ['required'],
        ] );

        //Se obtienen los datos
        $idFuncion = $request->input('idFuncion');  
        $horario = $request->input('horario');   
        $cantidadBoleto = $request->input('cantBoleto');   








-QUE TRAIGA TODAS LAS FUNCIONES DE LA FECHA DE LA PELICULA (NO LA FECHA DE LA RESERVA)
-LUEGO QUE CUENTE TODOS LOS BOLETOS COMPRADOS (TENIENDO EN CUENTA LA HORA DE LA PELICULA)
-DESPUES QUE HAGA UNA RESTA ENTRE LOS BOLETOS DISPONIBLES DE LA SALA, CON LOS BOLETOS COMPRADOS Y LOS BOLETOS A RESERVAR (DEPENDIENDO EL RESULTADO QUE REDIRECCIONE O CONTINUE)
-







        //Se buscan los datos de la funcion
        $datosFuncion=Funcion::where('id',$idFuncion)->get();



        $cantBoletoSala=$datosFuncion->sala->cantidad_asiento;
        $cantBoletoReservado=$cantidadBoleto;
        $cantBoletoDisponible=$cantBoletoSala-$cantBoletoReservado;

echo $datosFuncion->fecha;
        $aa=Reserva::select("cantidad_boleto")
                    ->where("fecha",$datosFuncion->fecha)
->get();
foreach($datosFuncion as $ab){
    echo $ab;
}


        ?><br><?php
        ?><br><?php

echo "Cantidad de Boletos de la sala: ".$cantBoletoSala." - Cantidad de boletos reservados: ".$cantBoletoReservado." - Cantidad de boletos disponibles: ".$cantBoletoDisponible;

        die();





        //Cargar valores
        //$reserva = new Reserva();

        //$reserva->id_Funcion=$idFuncion;


        //FECHA DEL DIA DE LA RESERVA Y HORA SELECCIONADA DE LA FUNCION
        //$reserva->fecha=$datosFuncion->fecha;
        //$reserva->hora=$horario;
        //$reserva->cantidad_boleto=$cantidadBoleto;
 


        //$reserva->save();





            //Cargar valores
            $reparto = new Reparto();

            $reparto->id_Pelicula=$idPelicula;
            $reparto->id_Actor=$idActor;

            $reparto->save();

            //Redireccion al registro de reparto
            return redirect()->route('reserva.asignar',['id'=>$idPelicula])->with(['message' => 'El actor '.$datosActor->nombre.' '.$datosActor->apellido.' fue asignado a la pelicula '.$pelicula->nombre.'']);
        

    }
}
