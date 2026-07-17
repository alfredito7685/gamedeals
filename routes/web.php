<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/ofertas', function () {
    if (!session('usuario_email')) {
        return redirect('/login');
    }
    return app(OfertaController::class)->index();
});

Route::get('/login', [AuthController::class, 'mostrarLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/registro', [AuthController::class, 'mostrarRegistro']);
Route::post('/registro', [AuthController::class, 'registrar']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function () {
    if (!session('usuario_email')) {
        return redirect('/login');
    }
    return view('dashboard');
});