<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'producto_id',
        'existencias',
        'ordenadas',
        'stock',
        'ultima_compra',
        'max',
        'min',
    ];
    public function productoId()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
