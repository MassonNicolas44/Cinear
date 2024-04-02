<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reparto;
use App\Models\Actor;
use App\Models\Pelicula;
use PHPUnit\Framework\Constraint\IsEmpty;

class RepartoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function asignar($id)
    {

        //Trae la pelicula a asignar los actores desde la Base de Datos
        $pelicula=Pelicula::find($id);

        //Trae la lista de actores desde la Base de Datos
        $actores=Actor::all();

        //Trae los actores que estan ya asignadas a la pelicula en cuestion
        $actoresPelicula = Reparto::where('id_Pelicula', $id)->get();

        //Retorna a la vista los actores a asignar, los actores ya asignados y la pelicula en cuestion
        return view('reparto.asignar',compact('actores','pelicula','actoresPelicula'));
    }

    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'actor' => ['required'],
        ] );

        //Se obtienen los datos
        $idActor = $request->input('actor');  
        $idPelicula = $request->input('idPelicula');   
        
        
        //Se buscan los datos del actor a asignar
        $datosActor=Actor::find($idActor);
        
        //Se buscan los datos de la pelicula a la cual se le van a asignar los actores
        $pelicula=Pelicula::find($idPelicula);

        //Se busca si el actor a asignar ya pertenece al reparto de la pelicula en cuestion
        $existeActorPelicula = Reparto::where('id_Actor', $idActor)->where('id_Pelicula',$idPelicula)->get();

        //Verifica si existe el actor en el reparto de la pelicula
        if (count($existeActorPelicula)){
            
            //Actor ya pertenece a esta pelicula
            return redirect()->route('reparto.asignar',['id'=>$idPelicula])->with(['message' => 'El actor '.$datosActor->nombre.' '.$datosActor->apellido.' YA ESTA asignado a la pelicula '.$pelicula->nombre.'']);

        }else{

            //Cargar valores
            $reparto = new Reparto();

            $reparto->id_Pelicula=$idPelicula;
            $reparto->id_Actor=$idActor;

            $reparto->save();

            //Redireccion al registro de reparto
            return redirect()->route('reparto.asignar',['id'=>$idPelicula])->with(['message' => 'El actor '.$datosActor->nombre.' '.$datosActor->apellido.' fue asignado a la pelicula '.$pelicula->nombre.'']);
        
        }

    }

    public function eliminar($id,$idPelicula)
    {
       
        Reparto::find($id)->delete();

        //Redireccion al registro de reparto
        return redirect()->route('reparto.asignar',['id'=>$idPelicula])->with(['message' => 'Se ha eliminado al actor de la pelicula correctamente']);

    }


}
