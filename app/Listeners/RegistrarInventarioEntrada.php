<?php

namespace App\Listeners;

use App\Events\InventarioEntrada;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
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
     * @param  \App\Events\InventarioEntrada  $event
     * @return void
     */
    public function handle(InventarioEntrada $event): void
    {
        Kardex::create([
            'producto_id' => $event->producto->id,
            'tipo_movimiento' => 'entrada',
            'cantidad' => $event->cantidad,
            'fecha' => now(),
            'user_id' => $event->usuario ? $event->usuario->id : null,
            'descripcion' => $event->descripcion,
            'precio_unitario' => $event->precioUnitario ?? null,
        ]);
    }
}