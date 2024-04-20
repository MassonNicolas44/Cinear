<?php

namespace App\Http\Controllers;

use App\Models\Funcion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $hoy = date('Y-m-d');

        //Trae la lista de pelicualas y sala (sin repetir valores) para ser mostrados en cartelera
        $datos=Funcion::select('*')->where('estado',"Habilitada")
        ->where('fechaFin','>=',$hoy)
        ->groupBy('id_Pelicula' , 'id_Sala', 'fechaInicio', 'fechaFin')
        ->orderBy('id_Sala','asc')->get();

        //Retorna a la vista, las funciones registradas para ser mostradas en la parte inferior
        return view('home',['datos'=>$datos]);

    }
}
