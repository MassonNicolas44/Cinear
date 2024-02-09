<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actor;
use App\Models\Nacionalidad;

class ActorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {

        $nacionalidades=Nacionalidad::all();

        return view('actor.registrar',compact('nacionalidades'));
    }

    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'nombre' => ['required', 'min:1' ,'string'],
        'apellido' => ['required', 'min:1' ,'string'],
        'nacionalidad' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $nombre = $request->input('nombre');   
        $apellido = $request->input('apellido');   
        $nacionalidad = $request->input('nacionalidad');   
 
        
        //Cargar valores
        $actor = new Actor();

        $actor->nombre=$nombre;
        $actor->apellido=$apellido;
        $actor->id_Nacionalidad_Act=$nacionalidad;

        $actor->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('actor.lista')->with(['message' => 'El actor '.$nombre.' '.$apellido.' de '.$actor->nacionalidad->descripcion.' fue agregado correctamente']);
    }

    public function lista()
    {

        $actores=Actor::orderby('apellido','asc')->get();

        //Redireccion de la pagina a la lista de Clientes
        return view('actor.lista',['actores'=>$actores]);

    }


    public function editar($id)
    {

        $actor=Actor::find($id);
        $nacionalidades=Nacionalidad::all();

        return view('actor.editar',compact('actor','nacionalidades'));
    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'nombre' => ['required', 'min:1' ,'string'],
        'apellido' => ['required', 'min:1' ,'string'],
        'nacionalidad' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $id = $request->input('idActor');   
        $nombre = $request->input('nombre'); 
        $apellido = $request->input('apellido');
        $nacionalidad = $request->input('nacionalidad');  
 
        $actor=Actor::find($id);

        //Cargar valores
        $actor->nombre=$nombre;
        $actor->apellido=$apellido;
        $actor->id_Nacionalidad_Act=$nacionalidad;

        $actor->update();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('actor.lista')->with(['message' => 'Actor '.$nombre.' '.$apellido.' modificado correctamente']);
    }

    public function eliminar($id)
    {

        $nombre=Actor::find($id)->nombre;
        $apellido=Actor::find($id)->apellido;
        

        Actor::find($id)->delete();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('actor.lista')->with(['message' => 'Se ha eliminado al actor '.$nombre.' '.$apellido.' correctamente']);

    }



}
