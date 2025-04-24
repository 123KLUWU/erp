<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Kardex;
use App\Models\Stock;

class KardexController extends Controller
{
    public function index()
    {
        return view('kardex/kardex');
    }
    public function show_all()
    {
        $movimientos = Kardex::with([
            'productoId',
            'userId'
        ])->orderBy('created_at', 'desc')->get();
    
        return view('kardex/kardexall', compact('movimientos'));
    }
    public function detalles($id)
    {
        $movimiento = Kardex::with([
            'productoId',
            'userId'
        ])->find($id);

        if (!$movimiento) {
            abort(404, 'Movimiento no encontrado');
        }
        return view('kardex/kardexdetalles', compact('movimiento'));
    }
    public function producto($producto_id)
    {
        $movimientos = Kardex::with([
            'productoId',
        ])->where('producto_id', $producto_id)->orderBy('created_at', 'desc')->get();   
        if ($movimientos->isEmpty()) {
            abort(404, 'No se encontraron movimientos para el producto');
        }
    
        return view('kardex/kardexproducto', compact('movimientos'));
    }
    public function create()
    {
        return view('kardex/kardexCreate', [
            'productos' => Producto::all(),
        ]);
        
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'user_id' => 'required|',
            'tipo_movimiento' => 'required|in:entrada,salida,ajuste',
            'cantidad' => 'required|integer',
            'fecha' => now(),
            'descripcion' => 'nullable|string|max:255',
            'precio_unitario' => 'required|numeric|min:0',
        ]);
        $stockController = new StockController();
        if ($request->tipo_movimiento == 'entrada') {
            $stockController->sumarStock($request->producto_id, $request->cantidad);
        } elseif ($request->tipo_movimiento == 'salida') {
            $stockController->restarStock($request->producto_id, $request->cantidad);
        } elseif ($request->tipo_movimiento == 'ajuste') {
            $stockController->ajustarStock($request->producto_id, $request->nueva_cantidad);
        }

        Kardex::create($validatedData);

        return redirect()->route('kardex.create')->with('success', 'Producto creado exitosamente.');
    }
    public function entrada(Request $request){
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
