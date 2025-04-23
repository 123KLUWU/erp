<?php

namespace App\Listeners;

use App\Events\InventarioSalida;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Kardex;

class RegistrarInventarioSalida
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param  \App\Events\InventarioSalida  $event
     * @return void
     */
    public function handle(InventarioSalida $event): void
    {
        Kardex::create([
            'producto_id' => $event->producto->id,
            'tipo_movimiento' => 'salida',
            'cantidad' => $event->cantidad,
            'fecha' => now(),
            'user_id' => $event->usuario ? $event->usuario->id : null,
            'descripcion' => $event->descripcion,
            'precio_unitario' => $event->precioUnitario ?? null,
        ]);
    }
}
