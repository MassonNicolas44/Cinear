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

        //Trae la lista de Categoria desde la Base de Datos
        $categorias=Categoria::orderby('descripcion','asc')->get();

        //Retorna a la vista, las categorias registradas para ser mostradas en la parte inferior
        return view('categoria.registrar',['categorias'=>$categorias]);
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

        //Redireccion al registro de categoria
        return redirect()->route('categoria.registrar')->with(['message' => 'Categoria "'.$descripcion.'" agregado correctamente']);
    }


    public function editar($id)
    {

        //Trae la lista de Categoria desde la Base de Datos
        $categorias=Categoria::orderby('descripcion','asc')->get();

        //Trae la Categoria a editar desde la Base de Datos
        $categoria=Categoria::find($id);

        //Retorna a la vista las categorias existente en la base de datos y la categoria a editar en particular
        return view('categoria.editar',['categorias'=>$categorias,'categoria'=>$categoria]);
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
 
        //Se buscan los datos de la categoria a editar
        $categoria=Categoria::find($id);

        //Cargar valores
        $categoria->descripcion=$descripcion;

        $categoria->update();

        //Redireccion al registro de categoria
        return redirect()->route('categoria.registrar')->with(['message' => 'Categoria "'.$descripcion.'" modificado correctamente']);
    }

    public function eliminar($id)
    {

        //Se guarda el nombre de la categoria para ser mostrado luego al eliminar
        $nombre=Categoria::find($id)->descripcion;

        Categoria::find($id)->delete();

        //Redireccion al registro de categoria
        return redirect()->route('categoria.registrar')->with(['message' => 'Se ha eliminado la categoria "'.$nombre.'" correctamente']);

    }



}
