<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelicula;
use App\Models\Categoria;
use App\Models\Nacionalidad;
use App\Models\Idioma;
use App\Models\Tipo;
use App\Models\Restriccion;

class PeliculaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {

        $categorias=Categoria::orderby('descripcion','asc')->get();
        $nacionalidades=Nacionalidad::orderby('descripcion','asc')->get();
        $idiomas=Idioma::orderby('descripcion','asc')->get();
        $tipos=Tipo::orderby('descripcion','asc')->get();
        $restricciones=Restriccion::orderby('descripcion','asc')->get();

        return view('pelicula.registrar',['categorias'=>$categorias,
                                    'nacionalidades'=>$nacionalidades,
                                    'idiomas'=>$idiomas,
                                    'tipos'=>$tipos,
                                    'restricciones'=>$restricciones]);
    }

    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'nombre' => ['required', 'min:1' ,'string'],
        'año' => ['required', 'min:1' ,'int'],
        'descripcion' => ['required', 'min:1' ,'string'],
        'categoria' => ['required', 'min:1' ,'string'],
        'nacionalidad' => ['required', 'min:1' ,'string'],
        'idioma' => ['required', 'min:1' ,'string'],
        'tipo' => ['required', 'min:1' ,'string'],
        'restriccion' => ['required', 'min:1' ,'string'],
        'precio' => ['required', 'min:1' ,'int'],
        ] );

        //Se obtienen los datos
        $nombre = $request->input('nombre');   
        $año = $request->input('año');   
        $descripcion = $request->input('descripcion');   
        $categoria = $request->input('categoria');   
        $nacionalidad = $request->input('nacionalidad');   
        $idioma = $request->input('idioma');   
        $tipo = $request->input('tipo');   
        $restriccion = $request->input('restriccion');   
        $precio = $request->input('precio'); 
        
        //Cargar valores
        $pelicula = new Pelicula();

        $pelicula->nombre=$nombre;
        $pelicula->año=$año;
        $pelicula->descripcion=$descripcion;
        $pelicula->id_Categoria=$categoria;
        $pelicula->id_Nacionalidad_Pel=$nacionalidad;
        $pelicula->id_Idioma=$idioma;
        $pelicula->id_Tipo=$tipo;
        $pelicula->id_Restriccion=$restriccion;
        $pelicula->precio=$precio;

        $pelicula->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('pelicula.lista')->with(['message' => 'La pelicula '.$nombre.' fue agregada correctamente']);
    }

    public function lista()
    {

        $peliculas=Pelicula::orderby('nombre','asc')->get();

        //Redireccion de la pagina a la lista de Clientes
        return view('pelicula.lista',['peliculas'=>$peliculas]);

    }


    public function editar($id)
    {

        $pelicula=Pelicula::find($id);
        $categorias=Categoria::orderby('descripcion','asc')->get();
        $nacionalidades=Nacionalidad::orderby('descripcion','asc')->get();
        $idiomas=Idioma::orderby('descripcion','asc')->get();
        $tipos=Tipo::orderby('descripcion','asc')->get();
        $restricciones=Restriccion::orderby('descripcion','asc')->get();

        return view('pelicula.editar',['pelicula'=>$pelicula,
                                    'categorias'=>$categorias,
                                    'nacionalidades'=>$nacionalidades,
                                    'idiomas'=>$idiomas,
                                    'tipos'=>$tipos,
                                    'restricciones'=>$restricciones]);
    }

    public function guardarModificacion(Request $request)
    {


        //Validacion de datos antes de cargar
        $validate = $this->validate($request, [
            'nombre' => ['required', 'min:1' ,'string'],
            'año' => ['required', 'min:1' ,'int'],
            'descripcion' => ['required', 'min:1' ,'string'],
            'categoria' => ['required', 'min:1' ,'string'],
            'nacionalidad' => ['required', 'min:1' ,'string'],
            'idioma' => ['required', 'min:1' ,'string'],
            'tipo' => ['required', 'min:1' ,'string'],
            'restriccion' => ['required', 'min:1' ,'string'],
            'precio' => ['required', 'min:1' ,'int'],
            ] );
    
            //Se obtienen los datos
            $nombre = $request->input('nombre');   
            $año = $request->input('año');   
            $descripcion = $request->input('descripcion');   
            $categoria = $request->input('categoria');   
            $nacionalidad = $request->input('nacionalidad');   
            $idioma = $request->input('idioma');   
            $tipo = $request->input('tipo');   
            $restriccion = $request->input('restriccion');   
            $precio = $request->input('precio'); 
            
            $id = $request->input('idPelicula'); 

            //Cargar valores
            $pelicula = Pelicula::find($id);
    
            $pelicula->nombre=$nombre;
            $pelicula->año=$año;
            $pelicula->descripcion=$descripcion;
            $pelicula->id_Categoria=$categoria;
            $pelicula->id_Nacionalidad_Pel=$nacionalidad;
            $pelicula->id_Idioma=$idioma;
            $pelicula->id_Tipo=$tipo;
            $pelicula->id_Restriccion=$restriccion;
            $pelicula->precio=$precio;
    
            $pelicula->update();
    
            //Redireccion de la pagina a la lista de Clientes
            return redirect()->route('pelicula.lista')->with(['message' => 'La pelicula '.$nombre.' fue modificada correctamente']);

    }

    public function eliminar($id)
    {

        $nombre=Pelicula::find($id)->nombre;        

        Pelicula::find($id)->delete();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('pelicula.lista')->with(['message' => 'Se ha eliminado la pelicula '.$nombre.' correctamente']);

    }



}
