<?php

namespace App\Http\Controllers;

use DateInterval;
use DateTime;
use Illuminate\Http\Request;

use DatePeriod;

use App\Models\Sala;
use App\Models\Funcion;
use App\Models\Pelicula;

class FuncionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registrar()
    {

        //Metodo para que se pueda seleccionar la hora cada 15 minutos
        $horaInicioIntervalo = '00:00';
        $horaFinIntervalo = '23:45';

        //Formateo de fecha para el intervalo
        $fechaInicioIntervalo = new DateTime($horaInicioIntervalo);
        $fechaFinIntervalo = new DateTime($horaFinIntervalo);
        $fechaFinIntervalo = $fechaFinIntervalo->modify( '+15 minutes' ); 

        //Array con el horario dividido cada 15 minutos
        $rangoHorario = new DatePeriod($fechaInicioIntervalo, new DateInterval('PT15M'), $fechaFinIntervalo);


        //Trae la lista de salas, peliculas y funciones desde la Base de Datos
        $salas=Sala::orderby('nombre','asc')->get();
        $peliculas=Pelicula::orderby('nombre','asc')->get();
        $funciones=Funcion::orderby('fecha','asc')->get();


        //Retorna a la vista, los datos obtenidos anteriormente para ser mostrados en la parte inferior
        return view('funcion.registrar',['salas'=>$salas,'peliculas'=>$peliculas,'funciones'=>$funciones,'rangoHorario'=>$rangoHorario]);
    }
    
    public function guardarRegistro(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'id_Sala' => ['required'],
        'id_Pelicula' => ['required'],
        'fechaInicio' => ['required'],
        'fechaFin' => ['required'],
        'lvhorario1' => ['required'],
        'lvhorario2' => ['required'],
        'lvhorario3' => ['required'],
        'lvhorario4' => ['required'],
        'sdhorario1' => ['required'],
        'sdhorario2' => ['required'],
        'sdhorario3' => ['required'],
        'sdhorario4' => ['required'],
        ] );

        //Se obtienen los datos
        $id_Sala = $request->input('id_Sala');  
        $id_Pelicula = $request->input('id_Pelicula');   
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        //Lunes a Viernes
        $lvhorario1 = $request->input('lvhorario1');
        $lvhorario2 = $request->input('lvhorario2');
        $lvhorario3 = $request->input('lvhorario3');
        $lvhorario4 = $request->input('lvhorario4');

        //Sabado y Domingo
        $sdhorario1 = $request->input('sdhorario1');
        $sdhorario2 = $request->input('sdhorario2');
        $sdhorario3 = $request->input('sdhorario3');
        $sdhorario4 = $request->input('sdhorario4');

        //Comprobacion de que la fecha de inicio es anterior a la fecha final
        if ($fechaInicio>$fechaFin){
            //Redireccion de la pagina
            return redirect()->route('funcion.asignar')->with(['message' => 'La fecha final debe ser MAYOR a la fecha de inicio']);
        }

        $fechaInicioBD = $fechaInicio;
        $fechaFinBD = $fechaFin;
        

        //Formateo de la fecha inicial y final
        $fechaInicio = new DateTime($fechaInicio);
        $fechaFin = new DateTime($fechaFin);
        
        //Recorre la fecha desde la inicial hasta la final
        for($i = $fechaInicio; $i <= $fechaFin; $i->modify('+1 day')){

            //Cargar valores
            $funcion = new Funcion();

            $funcion->id_Sala=$id_Sala;
            $funcion->id_Pelicula=$id_Pelicula;
            $funcion->fechaInicio=$fechaInicioBD;
            $funcion->fechaFin=$fechaFinBD;
            $funcion->estado="Habilitada";


            //Comprobacion de que el horario esta sin asignar (Lunes a Viernes)
            if($lvhorario1=="sinAsignar"){
                $funcion->lvhorario1=null;
            }else{
                $funcion->lvhorario1=$lvhorario1;
            }

            if($lvhorario2=="sinAsignar"){
                $funcion->lvhorario2=null;
            }else{
                $funcion->lvhorario2=$lvhorario2;
            }

            if($lvhorario3=="sinAsignar"){
                $funcion->lvhorario3=null;
            }else{
                $funcion->lvhorario3=$lvhorario3;
            }

            if($lvhorario4=="sinAsignar"){
                $funcion->lvhorario4=null;
            }else{
                $funcion->lvhorario4=$lvhorario4;
            }



            //Comprobacion de que el horario esta sin asignar (Sabado y Domingo)
            if($sdhorario1=="sinAsignar"){
                $funcion->sdhorario1=null;
            }else{
                $funcion->sdhorario1=$sdhorario1;
            }

            if($sdhorario2=="sinAsignar"){
                $funcion->sdhorario2=null;
            }else{
                $funcion->sdhorario2=$sdhorario2;
            }

            if($sdhorario3=="sinAsignar"){
                $funcion->sdhorario3=null;
            }else{
                $funcion->sdhorario3=$sdhorario3;
            }

            if($sdhorario4=="sinAsignar"){
                $funcion->sdhorario4=null;
            }else{
                $funcion->sdhorario4=$sdhorario4;
            }
        
            $funcion->fecha=$i;
            $funcion->save();
        }

        //Trae la sala y pelicula de la funcion a registrar para ser mostrados por mensaje
        $sala=Sala::find($id_Sala);
        $pelicula=Pelicula::find($id_Pelicula);

        //Redireccion al listado de funcion
        return redirect()->route('funcion.lista')->with(['message' => 'La pelicula "'.$pelicula->nombre.'" fue asignada a la sala "'.$sala->nombre.'" ']);
    }


    public function editarIndividual($id)
    {

        //Metodo para que se pueda seleccionar la hora cada 15 minutos
        $horaInicioIntervalo = '00:00';
        $horaFinIntervalo = '23:45';

        //Formateo de fecha para el intervalo
        $fechaInicioIntervalo = new DateTime($horaInicioIntervalo);
        $fechaFinIntervalo = new DateTime($horaFinIntervalo);
        $fechaFinIntervalo = $fechaFinIntervalo->modify( '+15 minutes' ); 

        //Array con el horario dividido cada 15 minutos
        $rangoHorario = new DatePeriod($fechaInicioIntervalo, new DateInterval('PT15M'), $fechaFinIntervalo);

        //Trae la lista de salas, peliculas, funciones y funcion (a editar individualmente) desde la Base de Datos
        $salas=Sala::orderby('nombre','asc')->get();
        $peliculas=Pelicula::orderby('nombre','asc')->get();
        $funciones=Funcion::orderby('fecha','asc')->get();
        $funcion=Funcion::orderby('fecha','asc')->find($id);

        //Retorna a la vista, los datos obtenidos anteriormente para ser mostrados en la parte inferior
        return view('funcion.editarIndividual',['salas'=>$salas,'peliculas'=>$peliculas,'funciones'=>$funciones,'rangoHorario'=>$rangoHorario,'funcion'=>$funcion]);
    }
    
    public function guardarModificacionIndividual(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'id_Sala' => ['required'],
        'id_Pelicula' => ['required'],

        ] );

        //Se obtienen los datos
        $id_Funcion = $request->input('id');  
        $id_Sala = $request->input('id_Sala');  
        $id_Pelicula = $request->input('id_Pelicula');   

        //Lunes a Viernes
        $lvhorario1 = $request->input('lvhorario1');
        $lvhorario2 = $request->input('lvhorario2');
        $lvhorario3 = $request->input('lvhorario3');
        $lvhorario4 = $request->input('lvhorario4');

        //Sabado y Domingo
        $sdhorario1 = $request->input('sdhorario1');
        $sdhorario2 = $request->input('sdhorario2');
        $sdhorario3 = $request->input('sdhorario3');
        $sdhorario4 = $request->input('sdhorario4');

        //Se buscan los datos de la funcion a editar
        $funcion = Funcion::find($id_Funcion);
  
        //Comprobacion de que el horario esta sin asignar-Lunes a Viernes
        if($lvhorario1=="sinAsignar"){
            $funcion->lvhorario1=null;
        }else{
            $funcion->lvhorario1=$lvhorario1;
        }

        if($lvhorario2=="sinAsignar"){
            $funcion->lvhorario2=null;
        }else{
            $funcion->lvhorario2=$lvhorario2;
        }

        if($lvhorario3=="sinAsignar"){
            $funcion->lvhorario3=null;
        }else{
            $funcion->lvhorario3=$lvhorario3;
        }

        if($lvhorario4=="sinAsignar"){
            $funcion->lvhorario4=null;
        }else{
            $funcion->lvhorario4=$lvhorario4;
        }

        //Comprobacion de que el horario esta sin asignar-Sabado y Domingo

        if($sdhorario1=="sinAsignar"){
            $funcion->sdhorario1=null;
        }else{
            $funcion->sdhorario1=$sdhorario1;
        } 

        if($sdhorario2=="sinAsignar"){
            $funcion->sdhorario2=null;
        }else{
            $funcion->sdhorario2=$sdhorario2;
        }

        if($sdhorario3=="sinAsignar"){
            $funcion->sdhorario3=null;
        }else{
            $funcion->sdhorario3=$sdhorario3;
        }

        if($sdhorario4=="sinAsignar"){
            $funcion->sdhorario4=null;
        }else{
            $funcion->sdhorario4=$sdhorario4;
        }

        $funcion->update();

        //Trae la sala y pelicula de la funcion a registrar para ser mostrados por mensaje
        $sala=Sala::find($id_Sala);
        $pelicula=Pelicula::find($id_Pelicula);

        //Redireccion al listado de funcion
        return redirect()->route('funcion.lista')->with(['message' => 'La pelicula "'.$pelicula->nombre.'" y la sala "'.$sala->nombre.'" fue editada correctamente ']);
    }


    public function editarTotal($id)
    {

        //Metodo para que se pueda seleccionar la hora cada 15 minutos
        $horaInicioIntervalo = '00:00';
        $horaFinIntervalo = '23:45';

        //Formateo de fecha para el intervalo
        $fechaInicioIntervalo = new DateTime($horaInicioIntervalo);
        $fechaFinIntervalo = new DateTime($horaFinIntervalo);
        $fechaFinIntervalo = $fechaFinIntervalo->modify( '+15 minutes' ); 

        //Array con el horario dividido cada 15 minutos
        $rangoHorario = new DatePeriod($fechaInicioIntervalo, new DateInterval('PT15M'), $fechaFinIntervalo);

        //Trae la lista de salas, peliculas, funciones y funcion (a editar total) desde la Base de Datos
        $salas=Sala::orderby('nombre','asc')->get();
        $peliculas=Pelicula::orderby('nombre','asc')->get();
        $funciones=Funcion::orderby('fecha','asc')->get();
        $funcion=Funcion::orderby('fecha','asc')->find($id);

       //Retorna a la vista, los datos obtenidos anteriormente para ser mostrados en la parte inferior
        return view('funcion.editarTotal',['salas'=>$salas,'peliculas'=>$peliculas,'funciones'=>$funciones,'rangoHorario'=>$rangoHorario,'funcion'=>$funcion]);
    }
    
    public function guardarModificacionTotal(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'id_Sala' => ['required'],
        'id_Pelicula' => ['required'],
        'fechaInicio' => ['required'],
        'fechaFin' => ['required'],
        'lvhorario1' => ['required'],
        'lvhorario2' => ['required'],
        'lvhorario3' => ['required'],
        'lvhorario4' => ['required'],
        'sdhorario1' => ['required'],
        'sdhorario2' => ['required'],
        'sdhorario3' => ['required'],
        'sdhorario4' => ['required'],
        ] );

        //Se obtienen los datos
        $id_Funcion = $request->input('id');  
        $id_Sala = $request->input('id_Sala');  
        $id_Pelicula = $request->input('id_Pelicula');   
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        

        //Lunes a Viernes
        $lvhorario1 = $request->input('lvhorario1');
        $lvhorario2 = $request->input('lvhorario2');
        $lvhorario3 = $request->input('lvhorario3');
        $lvhorario4 = $request->input('lvhorario4');

        //Sabado y Domingo
        $sdhorario1 = $request->input('sdhorario1');
        $sdhorario2 = $request->input('sdhorario2');
        $sdhorario3 = $request->input('sdhorario3');
        $sdhorario4 = $request->input('sdhorario4');

        //Comprobacion de que la fecha de inicio es anterior a la fecha final
        if ($fechaInicio>$fechaFin){
            //Redireccion de la pagina
            return redirect()->route('funcion.editarTotal')->with(['message' => 'La fecha final debe ser MAYOR a la fecha de inicio']);
        }

        //Se buscan los datos de la pelicual y sala seleccionada
        $funcion=Funcion::find($id_Funcion);

        //Se obtiene las funciones existente que coincidan con la sala y la pelicula a registrar
        $funciones = Funcion:: where('id_Sala', $funcion->id_Sala)
                                ->where('id_Pelicula', $funcion->id_Pelicula)
                                ->where('fechaInicio', $funcion->fechaInicio)
                                ->where('fechaFin', $funcion->fechaFin)
                                ->get();      
                                                                
        //Formateo de fecha inicial y final
        $aa = new DateTime($fechaInicio);
        $bb = new DateTime($fechaFin);

        //Recorre el array de id con esta pelicula y sala a editar
        foreach($funciones as $funcion2){

            //Recorre la fecha desde la inicial hasta la final
            for($i = $aa; $i <= $bb; $i->modify('+1 day')){

                //Busca si el rango entre la fecha de inicio y la fecha final existe el id, sino existe, lo crea
                $fechaBD = Funcion::
                where('id_Sala', $id_Sala)
                ->where('id_Pelicula', $id_Pelicula)
                ->where('fecha', $i)
                ->get(); 
                
                //En caso que la fecha exista en la base de datos, actualiza ese objeto, caso contrario crea uno nuevo
                if(count($fechaBD)==0){
                    $funcion = new Funcion();
                    $funcion->fechaInicio=$fechaInicio;
                    $funcion->fechaFin=$fechaFin;
                    $funcion->estado="Habilitada";
                }else{
                    $funcion=Funcion::find($funcion2->id);
                }

                $funcion->id_Sala=$id_Sala;
                $funcion->id_Pelicula=$id_Pelicula;

                //Comprobacion de que el horario esta sin asignar (Lunes a Viernes)
                if($lvhorario1=="sinAsignar"){
                    $funcion->lvhorario1=null;
                }else{
                    $funcion->lvhorario1=$lvhorario1;
                }

                if($lvhorario2=="sinAsignar"){
                    $funcion->lvhorario2=null;
                }else{
                    $funcion->lvhorario2=$lvhorario2;
                }

                if($lvhorario3=="sinAsignar"){
                    $funcion->lvhorario3=null;
                }else{
                    $funcion->lvhorario3=$lvhorario3;
                }

                if($lvhorario4=="sinAsignar"){
                    $funcion->lvhorario4=null;
                }else{
                    $funcion->lvhorario4=$lvhorario4;
                }

                //Comprobacion de que el horario esta sin asignar (Sabado y Domingo)

                if($sdhorario1=="sinAsignar"){
                    $funcion->sdhorario1=null;
                }else{
                    $funcion->sdhorario1=$sdhorario1;
                } 

                if($sdhorario2=="sinAsignar"){
                    $funcion->sdhorario2=null;
                }else{
                    $funcion->sdhorario2=$sdhorario2;
                }

                if($sdhorario3=="sinAsignar"){
                    $funcion->sdhorario3=null;
                }else{
                    $funcion->sdhorario3=$sdhorario3;
                }

                if($sdhorario4=="sinAsignar"){
                    $funcion->sdhorario4=null;
                }else{
                    $funcion->sdhorario4=$sdhorario4;
                }

                $funcion->fecha=$i;

                //En caso que la fecha exista en la base de datos, actualiza ese objeto, caso contrario crea uno nuevo
                if(count($fechaBD)==0){
                    $funcion->save();
                }else{
                    //Solo en el caso en que la fecha de la Base de Datos sea igual a la fecha actual en el recorrido del If sean iguales, va a actualizar el valor
                    foreach($fechaBD as $fechaB){
                        //Solo en el caso en el que la fecha capturada en esta iteracion sea igual a la fecha de la "Funcion" buscada por el id, se actualizara el objeto
                        if($fechaB->fecha == $funcion2->fecha){
                            $funcion->fechaInicio=$fechaInicio;
                            $funcion->fechaFin=$fechaFin;
                            $funcion->update();
                        }
                    }
                }  

            }  

            //Reformateo la fecha para que tome los valores iniciales al reiniciar el ciclo del foreach
            $aa = new DateTime($fechaInicio);
            $bb = new DateTime($fechaFin);
        } 
        
        //Trae la sala y pelicula de la funcion a registrar para ser mostrados por mensaje
        $sala=Sala::find($id_Sala);
        $pelicula=Pelicula::find($id_Pelicula);

        //Redireccion al listado de funcion
        return redirect()->route('funcion.lista')->with(['message' => 'La pelicula "'.$pelicula->nombre.'" y la sala "'.$sala->nombre.'" fue editada correctamente ']);
    }

    public function estado($id,$estado){

        //Se comprueba si el estado a actualizar el una fecha o un rango de fechas
        if($estado=="HabilitarRango" || $estado=="InhabilitarRango"){
    
                //Se buscan los datos de la funcion a editar el estado
                $funcion=Funcion::find($id);

                //Se obtiene las funciones existente que coincidan con la sala y la pelicula a actualizar estado
                $funciones = Funcion:: where('id_Sala', $funcion->id_Sala)
                ->where('id_Pelicula', $funcion->id_Pelicula)
                ->where('fechaInicio', $funcion->fechaInicio)
                ->where('fechaFin', $funcion->fechaFin)
                ->get();      

                //Recorre el array de id con esta pelicula y sala a editar
                foreach($funciones as $funcion2){

                    $funcion=Funcion::find($funcion2->id);

                    //Se comprueba si el estado es "HabilitarRango" se actualiza el estado a "Habilitada"
                    if($estado=="HabilitarRango"){
                        $funcion->estado="Habilitada";
                    }

                    //Se comprueba si el estado es "InhabilitarRango" se actualiza el estado a "Inhabilitada"
                    if($estado=="InhabilitarRango"){
                        $funcion->estado="Inhabilitada";
                    }
                    $funcion->update();
                     
                } 

        }else{

            //Se buscan los datos de la funcion a editar el estado
            $funcion=Funcion::find($id);

            //Se comprueba si el estado es "Habilitar" se actualiza el estado a "Habilitada"
            if($estado=="Habilitar"){
                $funcion->estado="Habilitada";
            }

            //Se comprueba si el estado es "Inhabilitar" se actualiza el estado a "Inhabilitada"
            if($estado=="Inhabilitar"){
                $funcion->estado="Inhabilitada";
            }

            $funcion->update();
        }

        //Formateo de fecha para que sea mas amigable al usuario
        $fechaInicio = (new DateTime($funcion->fechaInicio))->format('d-m-Y');
        $fechaFin = (new DateTime($funcion->fechaFin))->format('d-m-Y');

        //Redireccion al listado de funcion
        return redirect()->route('funcion.lista')->with(['message' => 'La funcion '.$funcion->pelicula->nombre.' de la sala '.$funcion->sala->nombre.'  desde el '.$fechaInicio.' al  '.$fechaFin.' fue '.$funcion->estado.' correctamente']);

    }

    public function lista(Request $request,$id=null)
    {
        $peliculaBuscar=$request->input('id_Pelicula');
        $salaBuscar=$request->input('id_Sala');

        //Condicion para verificar si se selecciono alguna pelicula con su sala respectiva
        if($id){

            //Se buscan los datos de la pelicual y sala seleccionada
            $funcion=Funcion::find($id);

            //Trae la lista de funciones de la pelicula y sala seleccionada
            $funciones=Funcion::where('id_Sala',$funcion->id_Sala)
            ->where('id_Pelicula',$funcion->id_Pelicula)
            ->where('fechaInicio','>=',$funcion->fechaInicio)
            ->where('fechaFin','<=',$funcion->fechaFin)
            ->orderby('fecha','asc')->get();


        }else{
            //Trae la lista de funciones de todas las peliculas y sala
            $funciones=Funcion::where('id_Pelicula','LIKE',$peliculaBuscar)
                                ->where('id_Sala','LIKE',$salaBuscar)
                                ->orderby('fecha','asc')
                                ->get();
        }

        //Trae la lista de peliculas y sala (sin repetir valores) para ser mostrados en la tabla simple
        $datos=Funcion::select('*')
                        ->where('id_Pelicula','LIKE',$peliculaBuscar)
                        ->where('id_Sala','LIKE',$salaBuscar)
                        ->groupBy('id_Pelicula' , 'id_Sala', 'fechaInicio', 'fechaFin')
                        ->get();

        //Trae la lista de peliculas y salas habilitada
        $peliculas=Pelicula::all();
        $salas=Sala::where("estado","Habilitada")->get();

        //Retorna a la vista las peliculas registradas
        return view('funcion.lista',['funciones'=>$funciones,'datos'=>$datos,'peliculas'=>$peliculas,'salas'=>$salas]);

    }


    public function eliminar($id)
    {

        Funcion::find($id)->delete();

        //Redireccion al listado de funcion
        return redirect()->route('funcion.lista')->with(['message' => 'Se ha eliminado correctamente']);

    }

}
