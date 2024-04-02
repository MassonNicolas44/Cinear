<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restriccion;

class RestriccionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {

        //Trae la lista de restricciones para ser mostradas en la parte inferior
        $restricciones=Restriccion::orderby('descripcion','asc')->get();

        //Retorna la vista de la restriccion a registrar
        return view('restriccion.registrar',['restricciones'=>$restricciones]);


    }

    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string','unique:restriccion'],
        ] );

        //Se obtienen los datos
        $descripcion = $request->input('descripcion');   
 
        //Cargar valores
        $restriccion = new Restriccion();

        $restriccion->descripcion=$descripcion;

        $restriccion->save();

        //Redireccion al registro de restriccion
        return redirect()->route('restriccion.registrar')->with(['message' => 'Restriccion de edad "'.$descripcion.'" agregada correctamente']);
    }

    public function editar($id)
    {

        //Trae la lista de restriccion desde la Base de Datos
        $restricciones=Restriccion::orderby('descripcion','asc')->get();

        //Trae la restriccion a editar desde la Base de Datos
        $restriccion=Restriccion::find($id);

        //Retorna a la vista las restricciones existente en la base de datos y la restriccion a editar en particular
        return view('restriccion.editar',['restricciones'=>$restricciones,'restriccion'=>$restriccion]);

    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $id = $request->input('idRestriccion');   
        $descripcion = $request->input('descripcion');   
 
        //Se buscan los datos de la restriccion a editar
        $restriccion=Restriccion::find($id);

        //Cargar valores
        $restriccion->descripcion=$descripcion;

        $restriccion->update();

        //Redireccion al registro de restriccion
        return redirect()->route('restriccion.registrar')->with(['message' => 'Restriccion de edad "'.$descripcion.'" modificada correctamente']);
    }

    public function eliminar($id)
    {

        //Se guarda el nombre de la restriccion para ser mostrado luego al eliminar
        $nombre=Restriccion::find($id)->descripcion;

        Restriccion::find($id)->delete();

        //Redireccion al registro de restriccion
        return redirect()->route('restriccion.registrar')->with(['message' => 'Se ha eliminado la restriccion de edad "'.$nombre.'" correctamente']);

    }



}
