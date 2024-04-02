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

        //Trae la lista de Nacionalidades a asignar al nuevo actor desde la Base de Datos
        $nacionalidades=Nacionalidad::all();

        //Retorna la vista del actor a registrar
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

        //Redireccion al listado de actores
        return redirect()->route('actor.lista')->with(['message' => 'El actor '.$nombre.' '.$apellido.' de '.$actor->nacionalidad->descripcion.' fue agregado correctamente']);
    }

    public function lista()
    {

        //Trae la lista de actores registrados
        $actores=Actor::orderby('apellido','asc')->get();

        //Retorna a la vista los actores registrados
        return view('actor.lista',['actores'=>$actores]);

    }


    public function editar($id)
    {

        //Se obtienen los datos del actor a editar
        $actor=Actor::find($id);

        //Retoma las nacionalidades registradas en la base de datos
        $nacionalidades=Nacionalidad::all();

        //Retorna la vista con los datos del actor a editar
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
 
        //Se buscan los datos del actor a editar
        $actor=Actor::find($id);

        //Cargar valores
        $actor->nombre=$nombre;
        $actor->apellido=$apellido;
        $actor->id_Nacionalidad_Act=$nacionalidad;

        $actor->update();

        //Redireccion al listado de actores
        return redirect()->route('actor.lista')->with(['message' => 'Actor '.$nombre.' '.$apellido.' modificado correctamente']);
    }

    public function eliminar($id)
    {

        //Se guarda el nombre y apellido del actor para ser mostrado luego al eliminar
        $nombre=Actor::find($id)->nombre;
        $apellido=Actor::find($id)->apellido;
        

        Actor::find($id)->delete();

        //Redireccion al listado de actores
        return redirect()->route('actor.lista')->with(['message' => 'Se ha eliminado al actor '.$nombre.' '.$apellido.' correctamente']);

    }



}
