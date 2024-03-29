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

        $pelicula=Pelicula::find($id);

        $actores=Actor::all();

        $actoresPelicula = Reparto::where('id_Pelicula', $id)->get();

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
        $datosActor=Actor::find($idActor);
        
        $idPelicula = $request->input('idPelicula');   
        $pelicula=Pelicula::find($idPelicula);

        //Busca en la tabla de "reparto" si existe un valor con el idActor y idPelicula a agregar
        $existeActorPelicula = Reparto::where('id_Actor', $idActor)->where('id_Pelicula',$idPelicula)->get();

        //Verifica si existe el actor ya en la pelicula, lo agrega. Caso contrario mostrara un mensaje
        if (count($existeActorPelicula)){
            
            //Actor ya pertenece a esta pelicula
            return redirect()->route('reparto.asignar',['id'=>$idPelicula])->with(['message' => 'El actor '.$datosActor->nombre.' '.$datosActor->apellido.' YA ESTA asignado a la pelicula '.$pelicula->nombre.'']);

        }else{

            //Cargar valores
            $reparto = new Reparto();

            $reparto->id_Pelicula=$idPelicula;
            $reparto->id_Actor=$idActor;

            $reparto->save();

            //Redireccion de la pagina a la lista de Actores
            return redirect()->route('reparto.asignar',['id'=>$idPelicula])->with(['message' => 'El actor '.$datosActor->nombre.' '.$datosActor->apellido.' fue asignado a la pelicula '.$pelicula->nombre.'']);
        
        }

    }

    public function eliminar($id,$idPelicula)
    {
       
        Reparto::find($id)->delete();

        //Redireccion de la pagina a la lista de Actores
        return redirect()->route('reparto.asignar',['id'=>$idPelicula])->with(['message' => 'Se ha eliminado al actor de la pelicula correctamente']);

    }


}
