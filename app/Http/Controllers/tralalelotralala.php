<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tralalelotralala extends Controller
{
    //
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PreciosController; // Agrega esta línea
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
use App\Models\Precios; // Agrega esta línea

class CatalogoController extends Controller
{
    // ... (Métodos index, productos, dba_delete, editar, update) ...

    public function store(Request $request)
    {
        // Validación de los datos del producto
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

        // Validación de los datos de precios
        $validatedPreciosData = $request->validate([
            'costo' => 'required|numeric',
            'descuento' => 'required|numeric',
            'ieps' => 'required|numeric',
            'iva' => 'required|numeric',
            'exento_de_iva' => 'required|boolean',
            'costo_neto' => 'required|numeric',
            'utilidad' => 'required|numeric',
            'precio' => 'required|numeric',
        ]);

        // Validación de los datos de stock
        $validatedStockData = $request->validate([
            'existencias' => 'required|integer|min:0',
            'ordenadas' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'ultima_compra' => 'nullable|date',
            'max' => 'required|integer|min:0',
            'min' => 'required|integer|min:0',
        ]);

        // 1. Crear el producto
        $producto = Producto::create($validatedProductoData);

        // 2. Crear los precios asociados al producto
        $validatedPreciosData['producto_id'] = $producto->id; // Asocia el producto_id
        Precios::create($validatedPreciosData);

        // 3. Crear el stock asociado al producto
        $validatedStockData['producto_id'] = $producto->id; // Asocia el producto_id
        Stock::create($validatedStockData);

        return redirect()->route('catalogo.index')->with('success', 'Producto creado exitosamente.');
    }

    // ... (Otros métodos) ...
}
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
    'costo' => 'required|numeric',
    'descuento' => 'required|numeric',
    'ieps' => 'required|numeric',
    'iva' => 'required|numeric',
    'exento_de_iva' => 'required|boolean',
    'costo_neto' => 'required|numeric',
    'utilidad' => 'required|numeric',
    'precio' => 'required|numeric',
]);

$validatedStockData = $request->validate([
    'existencias' => 'required|integer|min:0',
    'ordenadas' => 'required|integer|min:0',
    'stock' => 'required|integer|min:0',
    'ultima_compra' => 'nullable|date',
    'max' => 'required|integer|min:0',
    'min' => 'required|integer|min:0',
]);
<div class="card mb-3">
    <div class="card-header">
        Precios
        <button type="button" class="btn btn-sm btn-outline-secondary float-end" id="togglePrecios">Mostrar/Ocultar</button>
    </div>
    <div class="card-body" id="bodyPrecios">
        <div class="mb-3">
            <label for="costo" class="form-label">Costo</label>
            <input type="number" step="0.01" class="form-control" id="costo" name="costo"
                   placeholder="0.00">
        </div>
        <div class="mb-3">
            <label for="descuento" class="form-label">Descuento (%)</label>
            <input type="number" step="0.01" class="form-control" id="descuento" name="descuento"
                   value="0" placeholder="0.00">
        </div>
        <div class="mb-3">
            <label for="ieps" class="form-label">IEPS (%)</label>
            <input type="number" step="0.01" class="form-control" id="ieps" name="ieps"
                   value="0" placeholder="0.00">
        </div>
        <div class="mb-3">
            <label for="iva" class="form-label">IVA (%)</label>
            <input type="number" step="0.01" class="form-control" id="iva" name="iva"
                   value="16" placeholder="0.00">
        </div>
        <input type="checkbox" class="form-check-input" id="exento_de_iva"
               name="exento_de_iva" value="1" {{ old('exento_de_iva') ? 'checked' : '' }}>
        <label class="form-check-label" for="exento_de_iva">Exento de IVA</label>
        <input type="hidden" name="exento_de_iva" value="0" id="exento_de_iva_hidden">
        <div class="mb-3">
            <label for="costo_neto" class="form-label">Costo Neto</label>
            <input type="number" step="0.01" class="form-control" id="costo_neto" name="costo_neto"
                   readonly>
        </div>
        <div class="mb-3">
            <label for="utilidad" class="form-label">Utilidad (%)</label>
            <input type="number" step="0.01" class="form-control" id="utilidad" name="utilidad"
                   value="30" placeholder="0.00">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio"
                   readonly>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        Stock
        <button type="button" class="btn btn-sm btn-outline-secondary float-end" id="toggleStock">Mostrar/Ocultar</button>
    </div>
    <div class="card-body" id="bodyStock">
        <div class="mb-3">
            <label for="existencias" class="form-label">Existencias</label>
            <input type="number" class="form-control" id="existencias" name="existencias" value="0">
        </div>
        <div class="mb-3">
            <label for="ordenadas" class="form-label">Ordenadas</label>
            <input type="number" class="form-control" id="ordenadas" name="ordenadas" value="0">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="0"
                   readonly>
        </div>
        <div class="mb-3">
            <label for="ultima_compra" class="form-label">Última Compra</label>
            <input type="date" class="form-control" id="ultima_compra" name="ultima_compra">
        </div>
        <div class="mb-3">
            <label for="max" class="form-label">Máximo</label>
            <input type="number" class="form-control" id="max" name="max" value="0">
        </div>
        <div class="mb-3">
            <label for="min" class="form-label">Mínimo</label>
            <input type="number" class="form-control" id="min" name="min" value="0">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const preciosCardBody = document.getElementById('bodyPrecios');
        const stockCardBody = document.getElementById('bodyStock');
        const togglePreciosButton = document.getElementById('togglePrecios');
        const toggleStockButton = document.getElementById('toggleStock');

        // Inicialmente ocultar los cuerpos de las tarjetas
        preciosCardBody.style.display = 'none';
        stockCardBody.style.display = 'none';

        // Evento para mostrar/ocultar la sección de Precios
        togglePreciosButton.addEventListener('click', function () {
            preciosCardBody.style.display = preciosCardBody.style.display === 'none' ? 'block' : 'none';
        });

        // Evento para mostrar/ocultar la sección de Stock
        toggleStockButton.addEventListener('click', function () {
            stockCardBody.style.display = stockCardBody.style.display === 'none' ? 'block' : 'none';
        });
    });
</script>

<div class="modal fade" id="modalPrecio" tabindex="-1" aria-labelledby="modalPrecioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPrecioLabel">Editar Precios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarPrecio">
                    @csrf
                    @method('PUT') {{-- O PATCH --}}
                    <input type="hidden" name="producto_id" id="producto_id_precio">
                    <div class="mb-3">
                        <label for="costo_modal" class="form-label">Costo</label>
                        <input type="number" step="0.01" class="form-control" id="costo_modal" name="costo">
                    </div>
                    <div class="mb-3">
                        <label for="descuento_modal" class="form-label">Descuento (%)</label>
                        <input type="number" step="0.01" class="form-control" id="descuento_modal" name="descuento">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Precios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Producto;
use App\Models\User; // O el modelo responsable del movimiento

class InventarioEntrada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Producto $producto;
    public float $cantidad;
    public User|null $usuario; // O quien realizó el movimiento
    public string $descripcion;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Producto $producto, float $cantidad, ?User $usuario = null, string $descripcion = '')
    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->usuario = $usuario;
        $this->descripcion = $descripcion;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

<?php

namespace App\Listeners;

use App\Events\InventarioEntrada;
use App\Models\Kardex;

class RegistrarInventarioEntrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\InventarioEntrada  $event
     * @return void
     */
    public function handle(InventarioEntrada $event)
    {
        Kardex::create([
            'producto_id' => $event->producto->id,
            'tipo_movimiento' => 'entrada',
            'cantidad' => $event->cantidad,
            'fecha_movimiento' => now(),
            'usuario_id' => $event->usuario ? $event->usuario->id : null,
            'descripcion' => $event->descripcion,
            // ... otros campos del Kardex ...
        ]);
    }
}
<?php

namespace App\Providers;

use App\Events\InventarioAjuste;
use App\Events\InventarioEntrada;
use App\Events\InventarioSalida;
use App\Listeners\RegistrarInventarioAjuste;
use App\Listeners\RegistrarInventarioEntrada;
use App\Listeners\RegistrarInventarioSalida;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        InventarioEntrada::class => [
            RegistrarInventarioEntrada::class,
        ],
        InventarioSalida::class => [
            RegistrarInventarioSalida::class,
        ],
        InventarioAjuste::class => [
            RegistrarInventarioAjuste::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

use App\Events\InventarioEntrada;
use App\Models\Producto;
use App\Models\User;

// ... dentro de tu lógica de entrada de inventario ...
$producto = Producto::find($request->producto_id);
$cantidadEntrada = $request->cantidad;
$usuarioActual = auth()->user(); // Si hay un usuario autenticado

event(new InventarioEntrada($producto, $cantidadEntrada, $usuarioActual, 'Compra al proveedor X'));

// ... tu lógica para actualizar el stock del producto ...
$producto->increment('stock', $cantidadEntrada);
$producto->save();

'producto_id' => $event->producto->id,
'tipo_movimiento' => 'entrada',
'cantidad' => $event->cantidad,
'fecha' => now(), // Corregido para que coincida con el nombre de tu columna
'descripcion' => $event->descripcion,
'precio_unitario' => $event->precioUnitario ?? null,

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Producto;
use App\Models\User;

class InventarioSalida
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Producto $producto;
    public float $cantidad;
    public User|null $usuario;
    public string $descripcion;

    public function __construct(Producto $producto, float $cantidad, ?User $usuario = null, string $descripcion = '')
    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->usuario = $usuario;
        $this->descripcion = $descripcion;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
<?php

namespace App\Listeners;

use App\Events\InventarioSalida;
use App\Models\Kardex;

class RegistrarInventarioSalida
{
    public function __construct()
    {
        //
    }

    public function handle(InventarioSalida $event)
    {
        Kardex::create([
            'producto_id' => $event->producto->id,
            'tipo_movimiento' => 'salida',
            'cantidad' => $event->cantidad,
            'fecha' => now(),
            'descripcion' => $event->descripcion,
            // 'precio_unitario' podría ser el precio de venta si lo tienes disponible
        ]);
    }
}
use App\Events\InventarioEntrada;
use App\Models\Producto;
use App\Models\User;

// ... dentro de tu lógica de entrada de inventario ...
$producto = Producto::find($request->producto_id);
$cantidadEntrada = $request->cantidad;
$usuarioActual = auth()->user(); // Si hay un usuario autenticado

event(new InventarioEntrada($producto, $cantidadEntrada, $usuarioActual, 'Compra al proveedor X'));

// ... tu lógica para actualizar el stock del producto ...
$producto->increment('stock', $cantidadEntrada);
$producto->save();

public function editar($id)
{
    $producto = Producto::findOrFail($id);

    // Obtener los precios del producto
    $precios = Precios::where('producto_id', $producto->id)->first(); // Asumiendo que un producto tiene un solo registro de precios
    
    // Obtener el stock del producto
    $stock = Stock::where('producto_id', $producto->id)->first(); // Asumiendo que un producto tiene un solo registro de stock

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