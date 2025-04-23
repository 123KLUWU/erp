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

class PruebasController extends Controller
{
    public function index()
    {
        return view('pruebas', [
            'unidadesdecompra' => UnidadCompra::all(),
            'lineas' => Linea::all(),
            'marcas' => Marca::all(),
            'modelos' => Modelo::all(),
            'tallas' => Talla::all(),
            'colores' => Color::all(),
            'departamentos' => Departamento::all(),
            'ubicaciones' => Ubicacion::all(),
            'grupos' => Grupo::all(),
            'cortes' => Corte::all(),
            'niveles' => Nivel::all(),
        ]);
    }
    public function storeGeneric(Request $request, $entidad)
    {
        dd($request->all());
        $model = null;

        switch ($entidad) {
            case 'unidadcompra':
                $model = new UnidadCompra();
                break;
            case 'marca':
                $model = new Marca();
                break;
            case 'linea':
                $model = new Linea();
                break;
            case 'modelo':
                $model = new Modelo();
                break;
            case 'talla':
                $model = new Talla();
                break;
            case 'color':
                $model = new Color();
                break;
            case 'departamento':
                $model = new Departamento();
                break;
            case 'ubicacion':
                $model = new Ubicacion();
                break;
            case 'grupo':
                $model = new Grupo();
                break;
            case 'corte':
                $model = new Corte();
                break;
            case 'nivel':
                $model = new Nivel();
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Modelo no encontrado.']);
        }

        $rules = [];
        foreach ($request->except(['_token']) as $field => $value) {
            $rules[$field] = 'required|string|max:255'; // Ajusta las reglas
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            dd($validator->errors());
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        try {
            $model->fill($request->all());
            $model->save();
            return response()->json(['success' => true, 'id' => $model->id]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function updateGeneric(Request $request, $entidad)
    {
        dd($request->all());
        $model = null;

        switch ($entidad) {
            case 'unidadcompra':
                $model = UnidadCompra::find($request->input('opcionId'));
                break;
            case 'marca':
                $model = Marca::find($request->input('opcionId'));
                break;
            case 'linea':
                $model = Linea::find($request->input('opcionId'));
                break;
            case 'modelo':
                $model = Modelo::find($request->input('opcionId'));
                break;
            case 'talla':
                $model = Talla::find($request->input('opcionId'));
                break;
            case 'color':
                $model = Color::find($request->input('opcionId'));
                break;
            case 'departamento':
                $model = Departamento::find($request->input('opcionId'));
                break;
            case 'ubicacion':
                $model = Ubicacion::find($request->input('opcionId'));
                break;
            case 'grupo':
                $model = Grupo::find($request->input('opcionId'));
                break;
            case 'corte':
                $model = Corte::find($request->input('opcionId'));
                break;
            case 'nivel':
                $model = Nivel::find($request->input('opcionId'));
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Modelo no encontrado.']);
        }

        if (!$model) {
            return response()->json(['success' => false, 'message' => 'Registro no encontrado.']);
        }

        $rules = [];
        foreach ($request->except(['_token', 'opcionId']) as $field => $value) {
            $rules[$field] = 'required|string|max:255'; // Ajusta las reglas
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            dd($validator->errors());
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        try {
            $model->fill($request->except('opcionId'));
            $model->save();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        // Validación
        // numeric asegura que sea numérico
        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'existencias' => 'required|numeric',
            'ordenadas' => 'required|numeric',
            'stock' => 'required|numeric',
            'ultima_compra' => 'required|date',
            'max' => 'required|numeric',
            'min' => 'required|numeric',
        ]);
        Stock::create($validatedData);
        return redirect()->route('')->with('success', 'Stock actualizado exitosamente.');
    }
}
