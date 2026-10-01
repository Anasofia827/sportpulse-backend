<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class DisciplinaController extends Controller
{
    /** Comprueba la conexión activa y devuelve las disciplinas disponibles. */
    public function index(): JsonResponse
    {
        try {
            DB::connection()->getPdo();

            $disciplinas = DB::table('disciplinas')
                ->select('id', 'nombre', 'tipo_puntuacion')
                ->get();

            return response()->json([
                'success' => true,
                'message' => 'Conexión a la base de datos exitosa.',
                'database' => [
                    'status' => 'connected',
                ],
                'data' => $disciplinas,
            ], 200);
        } catch (Throwable $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
                'database' => [
                    'status' => 'error',
                ],
            ], 500);
        }
    }
}