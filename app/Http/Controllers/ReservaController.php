<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Funcion;
use App\Models\Reserva;

class ReservaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registrar()
    {

        //Trae la lista de funciones desde la Base de Datos
        $funciones=Funcion::orderby('id','asc')->get();

        //Retorna a la vista, las salas registradas para ser mostradas en la parte inferior
        return view('reserva.registrar',['funciones'=>$funciones]);
    }
}
