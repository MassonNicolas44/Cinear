<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {
        return view('categoria.registrar');
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
        $categoria = new Categoria();

        $categoria->descripcion=$descripcion;

        $categoria->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('categoria.lista')->with(['message' => 'Categoria "'.$descripcion.'" agregado correctamente']);
    }

    public function lista()
    {

        $categorias=Categoria::orderby('descripcion','asc')->get();

        //Redireccion de la pagina a la lista de Clientes
        return view('categoria.lista',['categorias'=>$categorias]);

    }


    public function editar($id)
    {

        $categoria=Categoria::find($id);

        return view('categoria.editar',compact('categoria'));
    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'descripcion' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $id = $request->input('idCategoria');   
        $descripcion = $request->input('descripcion');   
 
        $categoria=Categoria::find($id);

        //Cargar valores
        $categoria->descripcion=$descripcion;

        $categoria->update();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('categoria.lista')->with(['message' => 'Categoria "'.$descripcion.'" modificado correctamente']);
    }

    public function eliminar($id)
    {

        $nombre=Categoria::find($id)->descripcion;

        Categoria::find($id)->delete();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('categoria.lista')->with(['message' => 'Se ha eliminado la categoria "'.$nombre.'" correctamente']);

    }



}
