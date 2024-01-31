<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //

   // public function __construct()
   // {
   //     $this->middleware('auth');
   // }


    public function crear()
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

        $usuario->save();

        //Redireccion de la pagina a la lista de Clientes
        return redirect()->route('home')->with(['message' => 'Usuario agrego correctamente']);
    }

}
