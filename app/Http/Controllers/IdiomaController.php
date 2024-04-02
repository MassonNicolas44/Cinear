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

        //Retorna vista del idioma a registrar
        return view('idioma.registrar');
    }

    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string','unique:idioma'],
        ] );

        //Se obtienen los datos
        $descripcion = $request->input('descripcion');   
 
        //Cargar valores
        $idioma = new Idioma();

        $idioma->descripcion=$descripcion;

        $idioma->save();

        //Redireccion al listado de idioma
        return redirect()->route('idioma.lista')->with(['message' => 'Idioma "'.$descripcion.'" agregado correctamente']);
    }

    public function lista()
    {

        //Trae la lista de idiomas registrados
        $idiomas=Idioma::orderby('descripcion','asc')->get();

        //Retorna a la vista los idiomas registrados en la base de datos
        return view('idioma.lista',['idiomas'=>$idiomas]);

    }


    public function editar($id)
    {

        //Retoma los datos del idioma a editar
        $idioma=Idioma::find($id);

        //Retorna a la vista los datos del idioma a editar
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
 
        //Se obtienen los datos del idioma a editar
        $idioma=Idioma::find($id);

        //Cargar valores
        $idioma->descripcion=$descripcion;

        $idioma->update();

        //Redireccion a la lista de los idiomas
        return redirect()->route('idioma.lista')->with(['message' => 'Idioma "'.$descripcion.'" modificado correctamente']);
    }

    public function eliminar($id)
    {

        //Se guarda el nombre del idioma para ser mostrado luego al eliminar
        $nombre=Idioma::find($id)->descripcion;

        Idioma::find($id)->delete();

        //Redireccion a la lista de los idiomas
        return redirect()->route('idioma.lista')->with(['message' => 'Se ha eliminado el idioma "'.$nombre.'" correctamente']);

    }



}
