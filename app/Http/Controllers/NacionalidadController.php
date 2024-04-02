<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nacionalidad;

class NacionalidadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {

        //Retorna la vista de la nacionalidad a registrar
        return view('nacionalidad.registrar');
    }

    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string','unique:nacionalidad'],
        'sigla' => ['required', 'min:1' ,'max:3','string','unique:nacionalidad'],
        ] );

        //Se obtienen los datos
        $descripcion = $request->input('descripcion');   
        $sigla = $request->input('sigla');
 
        //Cargar valores
        $nacionalidad = new Nacionalidad();

        $nacionalidad->descripcion=$descripcion;
        $nacionalidad->sigla=$sigla;

        $nacionalidad->save();

        //Redireccion al listado de nacionalidades
        return redirect()->route('nacionalidad.lista')->with(['message' => 'Nacionalidad "'.$descripcion.'" agregada correctamente']);
    }

    public function lista()
    {

        //Trae la lista de nacionalidades registradas
        $nacionalidades=Nacionalidad::orderby('descripcion','asc')->get();

        //Retorna la vista de las nacionalidades registradas en la abse de datos
        return view('nacionalidad.lista',['nacionalidades'=>$nacionalidades]);

    }


    public function editar($id)
    {

        //Se obtienen los datos de la nacionalidad a editar
        $nacionalidad=Nacionalidad::find($id);

        //Retorna la vista con los datos de la nacionalidad a editar
        return view('nacionalidad.editar',compact('nacionalidad'));
    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string'],
        'sigla' => ['required', 'min:1' ,'max:3','string'],
        ] );

        //Se obtienen los datos
        $id = $request->input('idNacionalidad');   
        $descripcion = $request->input('descripcion');   
        $sigla = $request->input('sigla');
 
        //Se buscan los datos de la nacionalidad a editar
        $nacionalidad=Nacionalidad::find($id);

        //Cargar valores
        $nacionalidad->descripcion=$descripcion;
        $nacionalidad->sigla=$sigla;

        $nacionalidad->update();

        //Redireccion al listado de nacionalidades
        return redirect()->route('nacionalidad.lista')->with(['message' => 'Nacionalidad "'.$descripcion.'" modificada correctamente']);
    }

    public function eliminar($id)
    {

        //Se guarda el nombre de la nacionalidad para ser mostrado luego al eliminar
        $nombre=Nacionalidad::find($id)->descripcion;

        Nacionalidad::find($id)->delete();

        //Redireccion al listado de nacionalidades
        return redirect()->route('nacionalidad.lista')->with(['message' => 'Se ha eliminado la nacionalidad "'.$nombre.'" correctamente']);

    }



}
