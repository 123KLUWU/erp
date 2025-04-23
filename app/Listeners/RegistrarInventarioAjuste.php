<?php

namespace App\Listeners;

use App\Events\InventarioAjuste;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Kardex;

class RegistrarInventarioAjuste
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
     * @param  \App\Events\InventarioAjuste  $event
     * @return void
     */
    public function handle(InventarioAjuste $event): void
    {
        Kardex::create([
            'producto_id' => $event->producto->id,
            'tipo_movimiento' => 'ajuste',
            'cantidad' => $event->cantidad,
            'fecha' => now(),
            'user_id' => $event->usuario ? $event->usuario->id : null,
            'descripcion' => $event->descripcion,
            'precio_unitario' => $event->precioUnitario ?? null,
        ]);
    }
}
