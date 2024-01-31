<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Idioma;

class IdiomaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {
        return view('idioma.registrar');
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
        $idioma = new Idioma();

        $idioma->descripcion=$descripcion;

        $idioma->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('idioma.lista')->with(['message' => 'Idioma "'.$descripcion.'" agregado correctamente']);
    }

    public function lista()
    {

        $idiomas=Idioma::orderby('descripcion','asc')->get();

        //Redireccion de la pagina a la lista de Clientes
        return view('idioma.lista',['idiomas'=>$idiomas]);

    }


    public function editar($id)
    {

        $idioma=Idioma::find($id);

        return view('idioma.editar',compact('idioma'));
    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $id = $request->input('idIdioma');   
        $descripcion = $request->input('descripcion');   
 
        $idioma=Idioma::find($id);

        //Cargar valores
        $idioma->descripcion=$descripcion;

        $idioma->update();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('idioma.lista')->with(['message' => 'Idioma "'.$descripcion.'" modificado correctamente']);
    }

    public function eliminar($id)
    {

        $nombre=Idioma::find($id)->descripcion;

        Idioma::find($id)->delete();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('idioma.lista')->with(['message' => 'Se ha eliminado el idioma "'.$nombre.'" correctamente']);

    }



}
