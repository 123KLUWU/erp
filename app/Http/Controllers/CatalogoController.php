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

class CatalogoController extends Controller
{
    /**
     * Muestra el formulario.
     */
    public function index()
    {
        return view('productos/catalogo', [
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
    public function indexsofi()
    {
        return view('formulario', [
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
    /**
     * Procesar los datos del formulario.
     */
    public function store(Request $request)
    {
        $validatedProductoData = $request->validate([
            'clave' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'unidad_de_compra_id' => 'nullable|exists:unidadesdecompra,id',
            'linea_id' => 'nullable|exists:lineas,id',
            'marca_id' => 'nullable|exists:marcas,id',
            'modelo_id' => 'nullable|exists:modelos,id',
            'talla_id' => 'nullable|exists:tallas,id',
            'color_id' => 'nullable|exists:colors,id',
            'departamento_id' => 'nullable|exists:departamentos,id',
            'ubicacion_id' => 'nullable|exists:ubicaciones,id',
            'grupo_id' => 'nullable|exists:grupos,id',
            'corte_id' => 'nullable|exists:cortes,id',
            'nivel_id' => 'nullable|exists:niveles,id'
        ]);
        
        $validatedPreciosData = $request->validate([
            'costo' => 'nullable|numeric',
            'descuento' => 'nullable|numeric',
            'ieps' => 'nullable|numeric',
            'iva' => 'nullable|numeric',
            'excento_de_iva' => 'nullable|boolean', // Asegúrate de esto
            'costo_neto' => 'nullable|numeric',
            'utilidad' => 'nullable|numeric',
            'precio' => 'nullable|numeric',
        ]);
        
        $validatedStockData = $request->validate([
            'existencias' => 'nullable|integer', // Asegúrate de esto
            'ordenadas' => 'nullable|integer',    // Asegúrate de esto
            'stock' => 'nullable|integer',        // Asegúrate de esto
            'ultima_compra' => 'nullable|date',
            'max' => 'nullable|integer',          // Asegúrate de esto
            'min' => 'nullable|integer',          // Asegúrate de esto
        ]);
        // 1. Crear el producto
        $producto = Producto::create($validatedProductoData);

        // 2. Crear los precios asociados al producto
        $validatedPreciosData['producto_id'] = $producto->id; // Asocia el producto_id
        Precios::create($validatedPreciosData);

        // 3. Crear el stock asociado al producto
        $validatedStockData['producto_id'] = $producto->id; // Asocia el producto_id
        Stock::create($validatedStockData);

        // 4. Disparar el evento de entrada al Kardex (para el stock inicial)
        event(new InventarioEntrada(
            $producto, // El modelo del producto creado
            $validatedStockData['existencias'] ?? 0, // La cantidad inicial de existencias
            auth()->user(), // El usuario que creó el producto (si está autenticado)
            'Creación inicial del producto' // Una descripción del movimiento
        ));

        return redirect()->route('catalogo.index')->with('success', 'Producto creado exitosamente.');
    }

    public function productos()
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
            'nivel'
        ])->get();
    
        return view('productos/tablacatalogo', compact('productos'));
    }
    public function dba_delete($id)
    {
        $producto = Producto::find($id);

        if ($producto) {
            $producto->delete();
            return redirect()->route('productos')->with('success', 'Producto eliminado exitosamente.');
        } else {
            return redirect()->route('productos')->with('error', 'El producto no fue encontrado.');
        }
    }
    public function editar($id)
    {
        $producto = Producto::findOrFail($id); // Busca el producto por su ID. Si no existe, lanza una excepción 404.
        
        $precios = Precios::where('producto_id', $producto->id)->first();
    
        // Obtener el stock del producto
        $stock = Stock::where('producto_id', $producto->id)->first();
        return view('productos/editar', [
            'producto' => $producto,
            'precios' => $precios,
            'stock' => $stock,
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
    public function update(Request $request, $id)
    {
        $validatedPreciosData = $request->validate([
            'costo' => 'nullable|numeric',
            'descuento' => 'nullable|numeric',
            'ieps' => 'nullable|numeric',
            'iva' => 'nullable|numeric',
            'excento_de_iva' => 'nullable|boolean',
            'costo_neto' => 'nullable|numeric',
            'utilidad' => 'nullable|numeric',
            'precio' => 'nullable|numeric',
        ]);
        
        $validatedStockData = $request->validate([
            'existencias' => 'nullable|integer',
            'ordenadas' => 'nullable|integer',
            'stock' => 'nullable|integer',
            'ultima_compra' => 'nullable|date',
            'max' => 'nullable|integer',
            'min' => 'nullable|integer',
        ]);

        $validatedData = $request->validate([
            'clave' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'unidad_de_compra_id' => 'nullable|exists:unidadesdecompra,id',
            'linea_id' => 'nullable|exists:lineas,id',
            'marca_id' => 'nullable|exists:marcas,id',
            'modelo_id' => 'nullable|exists:modelos,id',
            'talla_id' => 'nullable|exists:tallas,id',
            'color_id' => 'nullable|exists:colors,id',
            'departamento_id' => 'nullable|exists:departamentos,id',
            'ubicacion_id' => 'nullable|exists:ubicaciones,id',
            'grupo_id' => 'nullable|exists:grupos,id',
            'corte_id' => 'nullable|exists:cortes,id',
            'nivel_id' => 'nullable|exists:niveles,id'
        ]);
    
        $producto = Producto::findOrFail($id);

        $producto->clave = $validatedData['clave'];
        $producto->codigo = $validatedData['codigo'];
        $producto->descripcion = $validatedData['descripcion'];
        $producto->unidad_de_compra_id = $validatedData['unidad_de_compra_id'];
        $producto->linea_id = $validatedData['linea_id'];
        $producto->marca_id = $validatedData['marca_id'];
        $producto->modelo_id = $validatedData['modelo_id'];
        $producto->talla_id = $validatedData['talla_id'];
        $producto->color_id = $validatedData['color_id'];
        $producto->departamento_id = $validatedData['departamento_id'];
        $producto->ubicacion_id = $validatedData['ubicacion_id'];
        $producto->grupo_id = $validatedData['grupo_id'];
        $producto->corte_id = $validatedData['corte_id'];
        $producto->nivel_id = $validatedData['nivel_id'];

        $producto->save();
        $precios = Precios::where('producto_id', $producto->id)->first();

        if ($precios) {
            $precios->update($validatedPreciosData);
        } else {
            $validatedPreciosData['producto_id'] = $producto->id;
            Precios::create($validatedPreciosData);
        }
        $stock = Stock::where('producto_id', $producto->id)->first();

        if ($stock) {
            $stock->update($validatedStockData);
            event(new InventarioAjuste(
                $producto, 
                $validatedStockData['existencias'] ?? 0, 
                auth()->user(), 
                'Ajuste del stock del producto'
            ));
        } else {
            $validatedStockData['producto_id'] = $producto->id;
            Stock::create($validatedStockData);
        }

        return redirect()->route('productos')->with('success', 'Producto actualizado exitosamente.');
    }
}