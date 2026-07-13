<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Google\Auth\Credentials\ServiceAccountCredentials;
use App\Http\Controllers\OfertaController;

Route::get('/ofertas', [OfertaController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gameDeals', function () {
    return "Bienvenido a GameDeals, la mejor página para encontrar ofertas de videojuegos.";
});

Route::get('/probar-firebase', function () {
    $rutaCredenciales = storage_path('app/firebase_credentials.json');

    $credenciales = new ServiceAccountCredentials(
        'https://www.googleapis.com/auth/datastore',
        $rutaCredenciales
    );


    
    $token = $credenciales->fetchAuthToken();
    $accessToken = $token['access_token'];

    $projectId = 'gamedeals-84757';

    $response = Http::withToken($accessToken)->post(
        "https://firestore.googleapis.com/v1/projects/{$projectId}/databases/(default)/documents/pruebas",
        [
            'fields' => [
                'mensaje' => ['stringValue' => 'Conexión exitosa con GameDeals'],
                'fecha' => ['stringValue' => now()->toDateTimeString()],
            ]
        ]
    );

    return $response->json();
});