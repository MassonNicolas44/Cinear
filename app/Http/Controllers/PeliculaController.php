<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Storage;
use Illuminate\Support\facades\File;


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
        'imagen' => 'dimensions:min_width=800,min_height=800',
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
        $imagen = $request->file('imagen'); 

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
        $pelicula->image_path=$imagen;
        $pelicula->estado="Habilitada";

        if($imagen){
            $imagen_nombre=time().$imagen->getClientOriginalName();
            Storage::disk('imagenes')->put($imagen_nombre,File::get($imagen));
            $pelicula->image_path=$imagen_nombre;
        }else{
            $pelicula->image_path="noImagen.png";
        }

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
            'imagen' => 'dimensions:min_width=800,min_height=800',
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
            $imagen = $request->file('imagen');
            
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

            //Si la imagen cargada es igual a la imagen que esta en el sistema, no se realiza ningun cambio
            if($imagen){
                if($pelicula->image_path!=$imagen->getClientOriginalName()){
                    $imagen_nombre=time().$imagen->getClientOriginalName();
                    Storage::disk('imagenes')->put($imagen_nombre,File::get($imagen));
                    $pelicula->image_path=$imagen_nombre;
                }
            }

            $pelicula->update();
    
            //Redireccion de la pagina a la lista de Clientes
            return redirect()->route('pelicula.lista')->with(['message' => 'La pelicula '.$nombre.' fue modificada correctamente']);

    }

    public function estado($id,$estado){

        $pelicula=Pelicula::find($id);

        if($estado=="Habilitar"){
            $pelicula->estado="Habilitada";
        }

        if($estado=="Inhabilitar"){
            $pelicula->estado="Inhabilitada";
        }

        $pelicula->update();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('pelicula.lista')->with(['message' => 'La pelicula '.$pelicula->nombre.' fue '.$pelicula->estado.' correctamente']);


    }

    public function eliminar($id)
    {

        $nombre=Pelicula::find($id)->nombre; 
        $imagen= Pelicula::find($id)->image_path;      

        Pelicula::find($id)->delete();

        if($imagen!="noImagen.png"){
            Storage::disk('imagenes')->delete($imagen);
        }

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('pelicula.lista')->with(['message' => 'Se ha eliminado la pelicula '.$nombre.' correctamente']);

    }



}
