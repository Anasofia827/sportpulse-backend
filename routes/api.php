<?php

use App\Http\Controllers\Api\DisciplinaController;
use App\Http\Controllers\Api\TestConexionController;
use Illuminate\Support\Facades\Route;

Route::apiResource('disciplinas', DisciplinaController::class);
Route::get('/test-db', [TestConexionController::class, 'estadoConexion']);