<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Barryvdh\DomPDF\Facade\Pdf;

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

        //Trae la lista de categorias, nacionalidades, idiomas, tipos y restricciones desde la Base de Datos
        $categorias=Categoria::orderby('descripcion','asc')->get();
        $nacionalidades=Nacionalidad::orderby('descripcion','asc')->get();
        $idiomas=Idioma::orderby('descripcion','asc')->get();
        $tipos=Tipo::orderby('descripcion','asc')->get();
        $restricciones=Restriccion::orderby('descripcion','asc')->get();

        //Retorna a la vista, los datos obtenidos anteriormente para ser utilizados en la creacion de pelicula
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
        'duracion' => ['required', 'min:1' ,'int'],
        'precio' => ['required', 'min:1' ,'int'],
        'url' => ['required', 'min:1' ,'string'],
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
        $duracion = $request->input('duracion'); 
        $precio = $request->input('precio'); 
        $imagen = $request->file('imagen'); 
        $url = $request->input('url'); 

        //Comprobacion que el nombre a registrar, existe o no en la base de datos
        $nombreExiste=Pelicula::select('nombre')->where('nombre',$nombre)->first();

        if($nombreExiste){

            //Redireccion al listado de peliculas
            return redirect()->route('pelicula.registrar')->with(['message' => 'La pelicula '.$nombre.' ya existe. Ingrese otro nombre']);

        }else{

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
            $pelicula->duracion=$duracion;
            $pelicula->image_path=$imagen;
            $pelicula->url=$url;
            $pelicula->estado="Habilitada";

            //Se verifica si hay una imagen a cargar para la pelicula
            if($imagen){
                $imagen_nombre=time().$imagen->getClientOriginalName();
                Storage::disk('imagenes')->put($imagen_nombre,File::get($imagen));
                $pelicula->image_path=$imagen_nombre;
            }else{
                $pelicula->image_path="noImagen.png";
            }

            $pelicula->save();

            //Redireccion al listado de peliculas
            return redirect()->route('pelicula.lista')->with(['message' => 'La pelicula '.$nombre.' fue agregada correctamente']);

        }

    }

    public function lista(Request $request)
    {

        $estadoBuscar=$request->input('estado');

        //Trae la lista de peliculas registradas
        $peliculas=Pelicula::where('estado','LIKE',$estadoBuscar)
        ->orderby('nombre','asc')->get();

        $estados=array('Habilitada','Inhabilitada');

        //Retorna a la vista las peliculas registradas
        return view('pelicula.lista',compact('peliculas','estados','estadoBuscar'));
   

    }


    public function editar($id)
    {

        //Se obtienen los datos de la pelicula a editar
        $pelicula=Pelicula::find($id);

        //Trae la lista de categorias, nacionalidades, idiomas, tipos y restricciones desde la Base de Datos
        $categorias=Categoria::orderby('descripcion','asc')->get();
        $nacionalidades=Nacionalidad::orderby('descripcion','asc')->get();
        $idiomas=Idioma::orderby('descripcion','asc')->get();
        $tipos=Tipo::orderby('descripcion','asc')->get();
        $restricciones=Restriccion::orderby('descripcion','asc')->get();

        //Retorna a la vista, los datos obtenidos anteriormente para ser utilizados en la edicion de la pelicula
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
            'duracion' => ['required', 'min:1' ,'int'],
            'precio' => ['required', 'min:1' ,'int'],
            'url' => ['required', 'min:1' ,'string'],
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
            $duracion = $request->input('duracion');  
            $precio = $request->input('precio'); 
            $imagen = $request->file('imagen');
            $url = $request->input('url'); 
            
            $id = $request->input('idPelicula'); 

            //Se buscan los datos de la pelicula a editar
            $pelicula = Pelicula::find($id);

            //Comprobacion que el nombre a registrar, existe o no en la base de datos
            $nombreExiste=Pelicula::select('nombre')->where('nombre',$nombre)->first();

            //Comprobacion si el nombre a ingresar ya existe, ademas de si el nombre a ingresar es distinto al nombre de la pelicula que se esta editando
            if(($nombreExiste) && ($nombreExiste->nombre!=$pelicula->nombre)){

                //Redireccion al registro de sala, mostrando el error
                return redirect()->route('pelicula.editar',['id'=>$id])->with(['message' => 'La pelicula '.$nombre.' ya existe. Ingrese otro nombre']);
                
            }else{

                //Cargar valores
                $pelicula->nombre=$nombre;
                $pelicula->año=$año;
                $pelicula->descripcion=$descripcion;
                $pelicula->id_Categoria=$categoria;
                $pelicula->id_Nacionalidad_Pel=$nacionalidad;
                $pelicula->id_Idioma=$idioma;
                $pelicula->id_Tipo=$tipo;
                $pelicula->id_Restriccion=$restriccion;
                $pelicula->duracion=$duracion;
                $pelicula->precio=$precio;
                $pelicula->url=$url;

                //Si la imagen cargada es igual a la imagen que esta en el sistema, no se realiza ningun cambio
                if($imagen){
                    if($pelicula->image_path!=$imagen->getClientOriginalName()){
                        $imagen_nombre=time().$imagen->getClientOriginalName();
                        Storage::disk('imagenes')->put($imagen_nombre,File::get($imagen));
                        $pelicula->image_path=$imagen_nombre;
                    }
                }

                $pelicula->update();
        
                //Redireccion al listado de peliculas
                return redirect()->route('pelicula.lista')->with(['message' => 'La pelicula '.$nombre.' fue modificada correctamente']);

            }
    }

    public function estado($id,$estado){

        //Se buscan los datos de la pelicula a editar el estado
        $pelicula=Pelicula::find($id);

        //Se comprueba si el estado es "Habilitar" se actualiza el estado a "Habilitada"
        if($estado=="Habilitar"){
            $pelicula->estado="Habilitada";
        }

        //Se comprueba si el estado es "Inhabilitar" se actualiza el estado a "Inhabilitada"
        if($estado=="Inhabilitar"){
            $pelicula->estado="Inhabilitada";
        }

        $pelicula->update();

        //Redireccion al listado de peliculas
        return redirect()->route('pelicula.lista')->with(['message' => 'La pelicula '.$pelicula->nombre.' fue '.$pelicula->estado.' correctamente']);


    }

    public function eliminar($id)
    {

        //Se guarda el nombre de la pelicula para ser mostrado luego al eliminar
        $nombre=Pelicula::find($id)->nombre; 
        $imagen= Pelicula::find($id)->image_path;      

        Pelicula::find($id)->delete();

        //Si la imagen es distinta a "noImage.png" entonces la borra, caso contrario borra la pelicula
        if($imagen!="noImagen.png"){
            Storage::disk('imagenes')->delete($imagen);
        }

        //Redireccion al listado de peliculas
        return redirect()->route('pelicula.lista')->with(['message' => 'Se ha eliminado la pelicula '.$nombre.' correctamente']);

    }


    public function reportePelicula(Request $request){

        $reporte = $request->input('reporte');   
        
        $estadoBuscar=$request->input('estado');

        //Trae la lista de peliculas registradas
        $peliculas=Pelicula::where('estado','LIKE',$estadoBuscar)
        ->orderby('nombre','asc')->get();

        $pdf=PDF::loadView('pelicula.reporte',compact('peliculas','estadoBuscar'));

        if($reporte=="Ver reporte de las peliculas"){

            return $pdf->stream('ListadoPeliculas.pdf');
            
        }elseif($reporte=="Descargar reporte de las peliculas"){

            return $pdf->download('ListadoPeliculas.pdf');
        }
    }

}
