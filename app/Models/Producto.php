<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'clave',
        'codigo',
        'descripcion',
        'unidad_de_compra_id',
        'linea_id',
        'marca_id',
        'modelo_id',
        'talla_id',
        'color_id',
        'departamento_id',
        'ubicacion_id',
        'grupo_id',
        'corte_id',
        'nivel_id',
    ];
    
    public function unidadCompra()
    {
        return $this->belongsTo(UnidadCompra::class, 'unidad_de_compra_id');
    }
    public function linea()
    {
        return $this->belongsTo(Linea::class, 'linea_id');
    }
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }
    public function talla()
    {
        return $this->belongsTo(Talla::class, 'talla_id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'ubicacion_id');
    }
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
    public function corte()
    {
        return $this->belongsTo(Corte::class, 'corte_id');
    }
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel_id');
    }

    public function precios() {
        return $this->hasOne(Precios::class, 'producto_id');
    }
    public function stock() {
        return $this->hasOne(Stock::class, 'producto_id');
    }
}
