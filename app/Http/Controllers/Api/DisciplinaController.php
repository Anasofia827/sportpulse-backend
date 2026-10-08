<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /** GET /api/disciplinas */
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Disciplinas listadas correctamente.',
            'data' => Disciplina::latest()->get(),
        ], 200);
    }

    /** POST /api/disciplinas */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100|unique:disciplinas,nombre',
            'tipo_puntuacion' => 'required|string|max:50',
        ]);

        $disciplina = Disciplina::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Disciplina creada correctamente.',
            'data' => $disciplina,
        ], 201);
    }

    /** GET /api/disciplinas/{disciplina} */
    public function show(Disciplina $disciplina): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Disciplina encontrada.',
            'data' => $disciplina,
        ], 200);
    }

    /** PUT/PATCH /api/disciplinas/{disciplina} */
    public function update(Request $request, Disciplina $disciplina): JsonResponse
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:100|unique:disciplinas,nombre,' . $disciplina->id,
            'tipo_puntuacion' => 'sometimes|required|string|max:50',
        ]);

        $disciplina->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Disciplina actualizada correctamente.',
            'data' => $disciplina,
        ], 200);
    }

    /** DELETE /api/disciplinas/{disciplina} */
    public function destroy(Disciplina $disciplina): JsonResponse
    {
        $disciplina->delete();

        return response()->json([
            'success' => true,
            'message' => 'Disciplina eliminada correctamente.',
        ], 200);
    }
}
