<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UsuariosController;



Route::prefix('/v1/auth')->group(function () {
       Route::post('/login', [AuthController::class, 'login']);
       Route::post('/me', [AuthController::class, 'me']);
       Route::post('/logout', [AuthController::class, 'logout']);
       Route::post('/refresh', [AuthController::class, 'refresh']);
       Route::post('/respondWithToken', [AuthController::class, 'respondWithToken']);
});

Route::prefix('/v1/usuarios/buscar')->group(function () {
    Route::get('/nombre/{nombre}', [UsuarioController::class, 'findByNombre']);
    Route::get('/email/{correo}', [UsuarioController::class, 'findByEmail']);
    Route::get('/rol/{id_rol}', [UsuarioController::class, 'findByRol']);
});
