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

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('nacionalidad.lista')->with(['message' => 'Nacionalidad "'.$descripcion.'" agregada correctamente']);
    }

    public function lista()
    {

        $nacionalidades=Nacionalidad::orderby('descripcion','asc')->get();

        //Redireccion de la pagina a la lista de Clientes
        return view('nacionalidad.lista',['nacionalidades'=>$nacionalidades]);

    }


    public function editar($id)
    {

        $nacionalidad=Nacionalidad::find($id);

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
 
        $nacionalidad=Nacionalidad::find($id);

        //Cargar valores
        $nacionalidad->descripcion=$descripcion;
        $nacionalidad->sigla=$sigla;

        $nacionalidad->update();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('nacionalidad.lista')->with(['message' => 'Nacionalidad "'.$descripcion.'" modificada correctamente']);
    }

    public function eliminar($id)
    {

        $nombre=Nacionalidad::find($id)->descripcion;

        Nacionalidad::find($id)->delete();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('nacionalidad.lista')->with(['message' => 'Se ha eliminado la nacionalidad "'.$nombre.'" correctamente']);

    }



}
