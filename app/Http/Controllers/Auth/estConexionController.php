<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class TestConexionController extends Controller
{
    /**
     * Endpoint para verificar el estado de la conexión a la base de datos
     */
    public function estadoConexion()
    {
        try {
            // Intenta obtener la instancia PDO y el nombre de la BD
            $db = DB::connection()->getPdo();
            $nombreDb = DB::connection()->getDatabaseName();

            // Consulta rápida para traer las disciplinas disponibles
            $disciplinas = DB::table('disciplinas')->get();

            return response()->json([
                'status' => 'success',
                'mensaje' => 'Conexión exitosa a la base de datos MySQL',
                'base_de_datos' => $nombreDb,
                'total_disciplinas' => count($disciplinas),
                'datos_muestra' => $disciplinas
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'mensaje' => 'Fallo al conectar con la base de datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}