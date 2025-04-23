<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kardex extends Model
{
    use HasFactory;

    protected $table = 'kardex';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'producto_id',
        'user_id',
        'tipo_movimiento',
        'cantidad',
        'fecha',
        'descripcion',
        'precio_unitario',
    ];
    public function productoId()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
