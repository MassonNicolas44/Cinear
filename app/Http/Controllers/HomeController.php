<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


              //Trae la lista de pelicualas y sala (sin repetir valores) para ser mostrados en la tabla simple
              $datos = Funcion::select('id_Sala','id_Pelicula')->distinct('id_Sala')->orderBy('id_Sala','asc')->get();

$aa=$datos;

              echo($aa);



              die();


        
        //Retorna a la vista, las funciones registradas para ser mostradas en la parte inferior
        return view('home',['datos'=>$datos]);



    }
}
