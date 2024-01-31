<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tipo;

class TipoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {
        return view('tipo.registrar');
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
        $tipo = new Tipo();

        $tipo->descripcion=$descripcion;

        $tipo->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('tipo.lista')->with(['message' => 'Tipo de pelicula "'.$descripcion.'" agregada correctamente']);
    }

    public function lista()
    {

        $tipos=Tipo::orderby('descripcion','asc')->get();

        //Redireccion de la pagina a la lista de Clientes
        return view('tipo.lista',['tipos'=>$tipos]);

    }


    public function editar($id)
    {

        $tipo=Tipo::find($id);

        return view('tipo.editar',compact('tipo'));
    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $id = $request->input('idTipo');   
        $descripcion = $request->input('descripcion');   
 
        $tipo=Tipo::find($id);

        //Cargar valores
        $tipo->descripcion=$descripcion;

        $tipo->update();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('tipo.lista')->with(['message' => 'Tipo de pelicula "'.$descripcion.'" modificada correctamente']);
    }

    public function eliminar($id)
    {

        $nombre=Tipo::find($id)->descripcion;

        Tipo::find($id)->delete();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('tipo.lista')->with(['message' => 'Se ha eliminado el tipo de pelicula "'.$nombre.'" correctamente']);

    }



}
