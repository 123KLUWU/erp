<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StockController;
use App\Models\Stock;
use App\Models\Producto;

class StockController extends Controller
{
    public function index()
    {
        return view('');
    }
    public function sumarStock($productoId, $cantidad) {
        $stock = Stock::where('producto_id', $productoId)->firstOrFail();

        $stock->existencias += $cantidad;
        $stock->stock + $cantidad;

        $stock->save();
    }
    public function restarStock($productoId, $cantidad) {
        $stock = Stock::where('producto_id', $productoId)->firstOrFail();

        if ($stock->existencias >= $cantidad) {
            $stock->existencias -= $cantidad;
            $stock->stock - $cantidad;
            $stock->save();
        } else {
            throw new \Exception("No hay suficiente stock disponible para el producto.");
        }
    }
     public function ajustarStock($productoId, $nuevaCantidad) {
        $stock = Stock::where('producto_id', $productoId)->firstOrFail();

        $stock->existencias = $nuevaCantidad;
        $stock->stock = $nuevaCantidad;

        $stock->save();
    }
}
