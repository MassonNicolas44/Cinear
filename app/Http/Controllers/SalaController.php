<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sala;

class SalaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registrar()
    {

        $salas=Sala::orderby('id','asc')->get();

        return view('sala.registrar',['salas'=>$salas]);
    }



    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'nombre' => ['required','min:1'],
        'cantAsiento' => ['required','min:1'],
        ] );

        //Se obtienen los datos
        $nombre = $request->input('nombre');
        $cantAsiento = $request->input('cantAsiento');

        //Cargar valores
        $sala = new Sala();

        $sala->nombre=$nombre;
        $sala->cantidad_asiento=$cantAsiento;
        $sala->estado="Habilitada";

        $sala->save();

        //Redireccion de la pagina a la sala
        return redirect()->route('sala.registrar')->with(['message' => 'La sala '.$nombre.' fue agregada correctamente']);
    }




    public function editar($id)
    {

        $sala=Sala::find($id);
        $salas=Sala::orderby('id','asc')->get();

        return view('sala.editar',['sala'=>$sala,'salas'=>$salas]);
    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
        $validate = $this->validate($request, [
            'id' => ['required'],
            'nombre' => ['required'],
            'cantAsiento' => ['required','min:1'],
            ] );
    
            //Se obtienen los datos
            $id = $request->input('id');
            $nombre = $request->input('nombre');
            $cantAsiento = $request->input('cantAsiento');

            //Cargar valores
            $sala = Sala::find($id);
    
            $sala->nombre=$nombre;
            $sala->cantidad_asiento=$cantAsiento;


            $sala->update();
    
        //Redireccion de la pagina a la sala
        return redirect()->route('sala.registrar')->with(['message' => 'La sala '.$nombre.' fue modificada correctamente']);

    }

    public function estado($id,$estado){

        $sala=Sala::find($id);

        if($estado=="Habilitar"){
            $sala->estado="Habilitada";
        }

        if($estado=="Inhabilitar"){
            $sala->estado="Inhabilitada";
        }

        $sala->update();

        //Redireccion de la pagina a la sala
        return redirect()->route('sala.registrar')->with(['message' => 'La sala '.$sala->nombre.' fue '.$sala->estado.' correctamente']);

    }

    public function eliminar($id)
    {

        $nombre=Sala::find($id)->nombre;  

        Sala::find($id)->delete();


        //Redireccion de la pagina a la lista de Sala
        return redirect()->route('sala.registrar')->with(['message' => 'Se ha eliminado la sala '.$nombre.' correctamente']);

    }
}
