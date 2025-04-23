<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Precios;
use App\Models\Producto;

class PreciosController extends Controller
{
    public function index()
    {
        return view('');
    }
    /**
     * Procesar los datos del formulario.
    */
    public function store(Request $request)
    {
        // Validación
        // numeric asegura que sea numérico
        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'costo' => 'required|numeric',
            'descuento' => 'required|numeric',
            'ieps' => 'required|numeric',
            'iva' => 'required|numeric',
            'excento_de_iva' => 'required|boolean',
            'costo_neto' => 'required|numeric',
            'utilidad' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);
        Precios::create($validatedData);
        return redirect()->route('')->with('success', 'Producto creado exitosamente.');
    }
}