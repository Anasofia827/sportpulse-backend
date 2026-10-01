<?php

use App\Http\Controllers\Api\DisciplinaController;
use App\Http\Controllers\Api\TestConexionController;
use Illuminate\Support\Facades\Route;

Route::get('/disciplinas', [DisciplinaController::class, 'index']);
Route::get('/test-db', [TestConexionController::class, 'estadoConexion']);