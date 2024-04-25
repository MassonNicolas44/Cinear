<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function registrar()
    {
        return view('usuario.registrar');
    }

    public function guardar(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'codigo' => ['required', 'min:1' ,'string','unique:users'],
        'password' => ['required', 'min:1' ,'string'],
        'nombre' => ['required', 'min:1' ,'string', 'max:255'],
        'apellido' => ['required','min:1' , 'string', 'max:255'],
        'dni' => ['required','min:1' , 'int', 'unique:users'],
        'email' => ['required','min:1' , 'string', 'max:255', 'unique:users'],
        'telefono' => ['required', 'min:1' ,'int'],
        'direccion' => ['required', 'min:1' ,'string', 'max:255'],
        'rol' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $codigo = $request->input('codigo');   
        $password = $request->input('password');   
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $dni = $request->input('dni');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $direccion = $request->input('direccion');
        $rol = $request->input('rol');   
 
        //Cargar valores
        $usuario = new User();

        $usuario->codigo=$codigo;
        $usuario->password=Hash::make($password);
        $usuario->nombre=$nombre;
        $usuario->apellido=$apellido;
        $usuario->dni=$dni;
        $usuario->email=$email;
        $usuario->telefono=$telefono;
        $usuario->direccion=$direccion;
        $usuario->rol=$rol;
        $usuario->estado="Habilitada";

        $usuario->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('home')->with(['message' => 'Usuario agrego correctamente']);
    }

    public function editar($id)
    {

        //Se obtienen los datos del usuario a editar
        $usuario=User::find($id);

        //Retorna a la vista, los datos obtenidos anteriormente para ser utilizados en la edicion de usuario
        return view('usuario.editar',['usuario'=>$usuario]);
    }

    public function guardarModificacion(Request $request)
    {

        //Validacion de datos antes de cargar
       $validate = $this->validate($request, [
        'codigo' => ['required', 'min:1' ,'string'],
        'nombre' => ['required', 'min:1' ,'string', 'max:255'],
        'apellido' => ['required','min:1' , 'string', 'max:255'],
        'dni' => ['required','min:1' , 'int'],
        'email' => ['required','min:1' , 'string', 'max:255'],
        'telefono' => ['required', 'min:1' ,'int'],
        'direccion' => ['required', 'min:1' ,'string', 'max:255'],
        'rol' => ['required', 'min:1' ,'string'],
        ] );

        //Se obtienen los datos
        $codigo = $request->input('codigo');     
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $dni = $request->input('dni');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $direccion = $request->input('direccion');
        $rol = $request->input('rol');           

        $id = $request->input('idUsuario'); 

        //Se buscan los datos de la pelicula a editar
        $usuario = User::find($id);

        //Comprobacion que el codigo de ingreso a modificar, existe o no en la base de datos
        $codigoExiste=User::select('codigo')->where('codigo',$codigo)->first();

        //Comprobacion que el dni a modificar, existe o no en la base de datos
        $dniExiste=User::select('dni')->where('dni',$dni)->first();

        //Comprobacion que el email a modificar, existe o no en la base de datos
        $emailExiste=User::select('email')->where('email',$email)->first();

        //Comprobacion si el codigo de ingreso a ingresar ya existe, ademas de si el codigo a ingresar es distinto al codigo del usuario que se esta editando
        if(($codigoExiste) && ($codigoExiste->codigo!=$usuario->codigo)){

            //Redireccion a la edicion de usuario
            return redirect()->route('usuario.editar',['id'=>$id])->with(['message' => 'El usuario no puede ser modificado, ya que el codigo de ingreso esta en uso']);
        
        }    

        //Comprobacion si el dni a ingresar ya existe, ademas de si el dni a ingresar es distinto al dni del usuario que se esta editando
        elseif(($dniExiste) && ($dniExiste->dni!=$usuario->dni)){

            //Redireccion a la edicion de usuario
            return redirect()->route('usuario.editar',['id'=>$id])->with(['message' => 'El usuario no puede ser modificado, ya que el dni de ingreso esta en uso']);
        
        }

        //Comprobacion si el email a ingresar ya existe, ademas de si el email a ingresar es distinto al email del usuario que se esta editando
        elseif(($emailExiste) && ($emailExiste->email!=$usuario->email)){

            //Redireccion a la edicion de usuario
            return redirect()->route('usuario.editar',['id'=>$id])->with(['message' => 'El usuario no puede ser modificado, ya que el email de ingreso esta en uso']);
        
        }

        else{

            //Cargar valores
            $usuario->codigo=$codigo;
            $usuario->nombre=$nombre;
            $usuario->apellido=$apellido;
            $usuario->dni=$dni;
            $usuario->email=$email;
            $usuario->telefono=$telefono;
            $usuario->direccion=$direccion;
            $usuario->rol=$rol;
            $usuario->estado="Habilitada";

            $usuario->update();

            //Redireccion al listado de peliculas
            return redirect()->route('usuario.lista')->with(['message' => 'El usuario '.$usuario->nombre.' '.$usuario->apellido.' ('.$usuario->rol.') fue modificado correctamente']);
        }
            
    
    }

    public function editarContraseña($id)
    {

        //Se obtienen los datos del usuario a resetear contraseña
        $usuario=User::find($id);


        $usuario->password=Hash::make("123");

        $usuario->update();

        $usuarios=User::all();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('usuario.lista',['usuarios'=>$usuarios])->with(['message' => 'El usuario '.$usuario->nombre.' '.$usuario->apellido.'  se le ha reseteado la contraseña correctamente']);
    }

    public function estado($id,$estado){

        //Se buscan los datos de la pelicula a editar el estado
        $usuario=User::find($id);

        //Se comprueba si el estado es "Habilitar" se actualiza el estado a "Habilitada"
        if($estado=="Habilitar"){
            $usuario->estado="Habilitada";
        }

        //Se comprueba si el estado es "Inhabilitar" se actualiza el estado a "Inhabilitada"
        if($estado=="Inhabilitar"){
            $usuario->estado="Inhabilitada";
        }

        $usuario->update();

        //Redireccion al listado de peliculas
        return redirect()->route('usuario.lista')->with(['message' => 'El usuario '.$usuario->nombre.' '.$usuario->apellido.'  fue '.$usuario->estado.' correctamente']);

    }

    public function lista(Request $request)
    {

        $usuarios=User::all();

        //Redireccion de la pagina a la lista de Clientes
        return view('usuario.lista',['usuarios'=>$usuarios]);
    }

}
