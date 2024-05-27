<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
       return ('codigo');
    }

    public function password()
    {
        return 'password';
    }



 protected function credentials(\Illuminate\Http\Request $request)
    {
        return ['codigo' => $request->{$this->username()}, 'password' => $request->{$this->password()}, 'estado' => "Habilitada"];
    }


protected function sendFailedLoginResponse(\Illuminate\Http\Request $request)
    {



        if ( !User::where('codigo', $request->{$this->username()})->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => 'El usuario no es correcto',
                ]);
        }

        if ( !Hash::check($request->{$this->password()},(User::where('codigo', $request->{$this->username()})->first())->password) ||  !User::where('codigo', $request->{$this->username()})->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => 'Error de contraseña',
                ]);
        }


        if ( !Hash::check($request->{$this->password()},(User::where('codigo', $request->{$this->username()})->first())->password)  ||  !User::where('codigo', $request->{$this->username()})->where('estado', "Habilitada")->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => 'Usuario desactivado',
                ]);
        }

    }



    public function loggedOut(Request $request) {
        return redirect('/home');
    }


}
