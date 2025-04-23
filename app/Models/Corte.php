<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Corte extends Model
{
    use HasFactory;

    protected $table = 'cortes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'corte',
    ];
}
