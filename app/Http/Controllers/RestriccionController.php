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
        return view('restriccion.registrar');
    }

    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string','unique:tipo'],
        ] );

        //Se obtienen los datos
        $descripcion = $request->input('descripcion');   
 
        //Cargar valores
        $restriccion = new Restriccion();

        $restriccion->descripcion=$descripcion;

        $restriccion->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('restriccion.lista')->with(['message' => 'Restriccion de edad "'.$descripcion.'" agregada correctamente']);
    }

    public function lista()
    {

        $restricciones=Restriccion::orderby('descripcion','asc')->get();

        //Redireccion de la pagina a la lista de Clientes
        return view('restriccion.lista',['restricciones'=>$restricciones]);

    }


    public function editar($id)
    {

        $restriccion=Restriccion::find($id);

        return view('restriccion.editar',compact('restriccion'));
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
 
        $restriccion=Restriccion::find($id);

        //Cargar valores
        $restriccion->descripcion=$descripcion;

        $restriccion->update();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('restriccion.lista')->with(['message' => 'Restriccion de edad "'.$descripcion.'" modificada correctamente']);
    }

    public function eliminar($id)
    {

        $nombre=Restriccion::find($id)->descripcion;

        Restriccion::find($id)->delete();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('restriccion.lista')->with(['message' => 'Se ha eliminado la restriccion de edad "'.$nombre.'" correctamente']);

    }



}
