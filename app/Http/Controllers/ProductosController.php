<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PreciosController;
use App\Models\Precios;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
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
use App\Models\Stock;
use App\Models\User;
use App\Events\InventarioEntrada;
use App\Events\InventarioAjuste;
use App\Events\InventarioSalida;

class ProductosController extends Controller
{
public function mostrarDetalles($id)
{
    $productos = Producto::with([
        'unidadCompra',
        'linea',
        'marca',
        'modelo',
        'talla',
        'color',
        'departamento',
        'ubicacion',
        'grupo',
        'corte',
        'nivel',
        'precios',
        'stock'
        ])->findOrFail($id);

        return view('productos/detalles', compact('productos'));
    }
}