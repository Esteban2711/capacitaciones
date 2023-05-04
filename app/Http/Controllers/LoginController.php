<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
   
    $credentials = $request->validate([
        'correo_electronico' => ['required', 'email'],
        'contrasena' => ['required'],
    ]);

    $usuario = Usuario::where('correo_electronico', $credentials['correo_electronico'])->first();

    if (!$usuario || !Hash::check($credentials['contrasena'], $usuario->contrasena)) {
        return redirect()->route('login')
            ->with('error', 'Las credenciales proporcionadas son incorrectas.');
    }

    Auth::login($usuario);

    $noAdmin = false;
    return redirect()->route('administrar' , $noAdmin);



    }




    public function registro()
    {
        return view('registro');
    }


    


    public function crearRegistro(Request $request)
    {
    $data = $request->validate([
        'nombre' => 'required|string|max:255',
        'correo_electronico' => 'required|string|email|unique:usuarios|max:255',
        'contrasena' => 'required|string|min:8',
    ]);

    $usuario = new Usuario([
        'nombre' => $data['nombre'],
        'correo_electronico' => $data['correo_electronico'],
        'contrasena' => Hash::make($data['contrasena']),
    ]);
    $usuario->save();

    return redirect()->route('login');
    }



    public function iniciarAdmin(Request $request)
    {
     $correo_electronico = request('correo_electronico');
    $contrasena = request('contrasena');

    if ($correo_electronico === 'admin@gmail.com' && $contrasena === 'admin') {
        $administrador = 1;
        return redirect()->route('administrar', ['parametro' =>1]);
    } else {
        return redirect()->route('login-admin')
        ->with('error', 'Las credenciales proporcionadas son incorrectas.');    }
    }
}
