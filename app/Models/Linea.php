<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Linea extends Model
{
    use HasFactory;

    protected $table = 'lineas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'linea',
    ];
}
