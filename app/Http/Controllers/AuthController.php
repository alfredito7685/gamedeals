<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Google\Auth\Credentials\ServiceAccountCredentials;

class AuthController extends Controller
{
    // esto lo repito en cada función porque así ya lo teníamos probado
    public function conectarFirestore()
    {
        $ruta = storage_path('app/firebase_credentials.json');
        $cred = new ServiceAccountCredentials('https://www.googleapis.com/auth/datastore', $ruta);
        $token = $cred->fetchAuthToken();
        return $token['access_token'];
    }

    public function mostrarLogin()
    {
        return view('login');
    }

    public function mostrarRegistro()
    {
        return view('registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $token = $this->conectarFirestore();
        $id = md5($request->email);
        $projectId = 'gamedeals-84757';

        Http::withToken($token)->patch(
            "https://firestore.googleapis.com/v1/projects/{$projectId}/databases/(default)/documents/usuarios/{$id}",
            [
                'fields' => [
                    'email' => ['stringValue' => $request->email],
                    'password' => ['stringValue' => Hash::make($request->password)],
                ]
            ]
        );

        return redirect('/login')->with('mensaje', 'Cuenta creada, ya puedes entrar.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $token = $this->conectarFirestore();
        $id = md5($request->email);
        $projectId = 'gamedeals-84757';

        $response = Http::withToken($token)->get(
            "https://firestore.googleapis.com/v1/projects/{$projectId}/databases/(default)/documents/usuarios/{$id}"
        );

        if ($response->failed()) {
            return back()->withErrors(['email' => 'Usuario no encontrado']);
        }

        $datos = $response->json();
        $passwordGuardado = $datos['fields']['password']['stringValue'];

        if (!Hash::check($request->password, $passwordGuardado)) {
            return back()->withErrors(['email' => 'Contraseña incorrecta']);
        }

        session(['usuario_email' => $request->email]);

        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->forget('usuario_email');
        return redirect('/login');
    }
}