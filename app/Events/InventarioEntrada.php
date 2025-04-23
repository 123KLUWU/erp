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

class InventarioEntrada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Producto $producto;
    public float $cantidad;
    public User|null $usuario;
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
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
