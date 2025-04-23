<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\UnidadCompra;
use App\Models\Marca;
use App\Models\Linea;
use App\Models\Modelo;
use App\Models\Talla;
use App\Models\Color;
use App\Models\Departamento;
use App\Models\Ubicacion;
use App\Models\Grupo;
use App\Models\Corte;
use App\Models\Nivel;

class ModalController extends Controller
    {
        public function storeGeneric(Request $request, $entidad)
    {
        switch ($entidad) {
            case 'unidadcompra':
                $validatedData = $request->validate([
                    'unidad' => 'required|string|max:255',
                    'abreviacion' => 'required|string|max:255',
                ]);
                UnidadCompra::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'marca':
                $validatedData = $request->validate([
                    'marca' => 'required|string|max:255',
                ]);
                Marca::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'linea':
                $validatedData = $request->validate([
                    'linea' => 'required|string|max:255',
                ]);
                Linea::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'modelo':
                $validatedData = $request->validate([
                    'modelo' => 'required|string|max:255',
                ]);
                Modelo::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'talla':
                $validatedData = $request->validate([
                    'talla' => 'required|string|max:255',
                ]);
                Talla::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'color':
                $validatedData = $request->validate([
                    'color' => 'required|string|max:255',
                ]);
                Color::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'departamento':
                $validatedData = $request->validate([
                    'departamento' => 'required|string|max:255',
                ]);
                Departamento::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'ubicacion':
                $validatedData = $request->validate([
                    'ubicacion' => 'required|string|max:255',
                ]);
                Ubicacion::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'grupo':
                $validatedData = $request->validate([
                    'grupo' => 'required|string|max:255',
                ]);
                Grupo::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'corte':
                $validatedData = $request->validate([
                    'corte' => 'required|string|max:255',
                ]);
                Corte::create($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'nivel':
                $validatedData = $request->validate([
                    'nivel' => 'required|string|max:255',
                ]);
                Nivel::create($validatedData);
                return response()->json(['success' => true]);
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Modelo no encontrado.']);
        }
    }

    public function updateGeneric(Request $request, $entidad)
    {
        $opcionId = $request->input('opcionId');

        switch ($entidad) {
            case 'unidadcompra':
                $validatedData = $request->validate([
                    'unidad' => 'required|string|max:255',
                    'abreviacion' => 'required|string|max:255',
                ]);
                $model = UnidadCompra::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'marca':
                $validatedData = $request->validate([
                    'marca' => 'required|string|max:255',
                ]);
                $model = Marca::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'linea':
                $validatedData = $request->validate([
                    'linea' => 'required|string|max:255',
                ]);
                $model = Linea::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'modelo':
                $validatedData = $request->validate([
                    'modelo' => 'required|string|max:255',
                ]);
                $model = Modelo::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'talla':
                $validatedData = $request->validate([
                    'talla' => 'required|string|max:255',
                ]);
                $model = Talla::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'color':
                $validatedData = $request->validate([
                    'color' => 'required|string|max:255',
                ]);
                $model = Color::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'departamento':
                $validatedData = $request->validate([
                    'departamento' => 'required|string|max:255',
                ]);
                $model = Departamento::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'ubicacion':
                $validatedData = $request->validate([
                    'ubicacion' => 'required|string|max:255',
                ]);
                $model = Ubicacion::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'grupo':
                $validatedData = $request->validate([
                    'grupo' => 'required|string|max:255',
                ]);
                $model = Grupo::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'corte':
                $validatedData = $request->validate([
                    'corte' => 'required|string|max:255',
                ]);
                $model = Corte::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            case 'nivel':
                $validatedData = $request->validate([
                    'nivel' => 'required|string|max:255',
                ]);
                $model = Nivel::find($opcionId);
                $model->update($validatedData);
                return response()->json(['success' => true]);
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Modelo no encontrado.']);
        }
    }
}