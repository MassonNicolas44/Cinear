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

        //Trae la lista de tipo desde la Base de Datos
        $tipos=Tipo::orderby('descripcion','asc')->get();

        //Retorna a la vista, los tipo registrados para ser mostradas en la parte inferior
        return view('tipo.registrar',['tipos'=>$tipos]);

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

        //Redireccion al registro de tipo
        return redirect()->route('tipo.registrar')->with(['message' => 'Tipo de pelicula "'.$descripcion.'" agregada correctamente']);
    }


    public function editar($id)
    {

        //Trae la lista de tipo desde la Base de Datos
        $tipos=Tipo::orderby('descripcion','asc')->get();

        //Trae el tipo a editar desde la Base de Datos
        $tipo=Tipo::find($id);

        //Retorna a la vista los tipos existentes en la base de datos y el tipo a editar en particular
        return view('tipo.editar',['tipos'=>$tipos,'tipo'=>$tipo]);
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
 
        //Se buscan los datos del tipo a editar
        $tipo=Tipo::find($id);

        //Cargar valores
        $tipo->descripcion=$descripcion;

        $tipo->update();

        //Redireccion al registro de tipo
        return redirect()->route('tipo.registrar')->with(['message' => 'Tipo de pelicula "'.$descripcion.'" modificada correctamente']);
    }

    public function eliminar($id)
    {

        //Se guarda el nombre del tipo para ser mostrado luego al eliminar
        $nombre=Tipo::find($id)->descripcion;

        Tipo::find($id)->delete();

         //Redireccion al registro de tipo
        return redirect()->route('tipo.registrar')->with(['message' => 'Se ha eliminado el tipo de pelicula "'.$nombre.'" correctamente']);

    }



}
