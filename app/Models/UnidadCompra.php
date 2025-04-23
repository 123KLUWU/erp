<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadCompra extends Model
{
    use HasFactory;

    protected $table = 'unidadesdecompra';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'unidad',
        'abreviacion',
    ];
}
