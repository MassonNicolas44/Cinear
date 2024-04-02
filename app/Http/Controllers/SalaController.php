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

        //Trae la lista de salas desde la Base de Datos
        $salas=Sala::orderby('id','asc')->get();

        //Retorna a la vista, las salas registradas para ser mostradas en la parte inferior
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

        //Redireccion al registro de sala
        return redirect()->route('sala.registrar')->with(['message' => 'La sala '.$nombre.' fue agregada correctamente']);
    }




    public function editar($id)
    {

        //Trae la lista de salas desde la Base de Datos
        $salas=Sala::orderby('id','asc')->get();

        //Trae la sala a editar desde la Base de Datos
        $sala=Sala::find($id);


        //Retorna a la vista las salas existente en la base de datos y la sala a editar en particular
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

    
            //Se buscan los datos de la sala a editar
            $sala = Sala::find($id);
    
            //Cargar valores
            $sala->nombre=$nombre;
            $sala->cantidad_asiento=$cantAsiento;


            $sala->update();
    
            //Redireccion al registro de sala
            return redirect()->route('sala.registrar')->with(['message' => 'La sala '.$nombre.' fue modificada correctamente']);

    }

    public function estado($id,$estado){

        //Se buscan los datos de la sala a editar el estado
        $sala=Sala::find($id);

        //Se comprueba si el estado es "Habilitar" se actualiza el estado a "Habilitada"
        if($estado=="Habilitar"){
            $sala->estado="Habilitada";
        }

        //Se comprueba si el estado es "Inhabilitar" se actualiza el estado a "Inhabilitada"
        if($estado=="Inhabilitar"){
            $sala->estado="Inhabilitada";
        }

        $sala->update();

        //Redireccion al registro de sala
        return redirect()->route('sala.registrar')->with(['message' => 'La sala '.$sala->nombre.' fue '.$sala->estado.' correctamente']);

    }

    public function eliminar($id)
    {

        //Se guarda el nombre de la sala para ser mostrado luego al eliminar
        $nombre=Sala::find($id)->nombre;  

        Sala::find($id)->delete();

        //Redireccion al registro de sala
        return redirect()->route('sala.registrar')->with(['message' => 'Se ha eliminado la sala '.$nombre.' correctamente']);

    }
}
