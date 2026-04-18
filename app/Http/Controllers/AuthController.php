<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //* regresar a la vista de formulario
    public function registerForm(){
        return view('auth.register');
    }

    //* guardar info a la bd
    public function register(Request $request){
        $request->validate([
            'name' => 'required',            
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request -> has('is_admin'),
        ]);

        //* iniciar sesion de forma automatica
        //Auth::login($user);

        return redirect()->route('auth.login');
    }

    public function loginForm(){
        if (Auth::check()) {
            return redirect()->route('souvenirs.index')
            ->with('warning', 'Tienes una sesión activa.');
        }
        return view('auth.login');
    }

    public function login(Request $request){
        //? Validar los datos que se obtienen del formulario
        $data = $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //? Se realiza una validación para generar la sesión
        if(Auth::attempt($data)){
            //? Generar la sesión
            $request -> session()->regenerate();

            //? Redireccionar al usuario a cualquier ruta del sistema
            return redirect()->route('souvenirs.index');
        }

        return back()->withErrors([
            'email' => 'Datos incorrectos',
        ]);
    }

    public function logout(Request $request){
        //? Cierre de sesión
        Auth::logout();

        //! Cierre de credenciales en sesiones
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/acceso');

    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }

}
