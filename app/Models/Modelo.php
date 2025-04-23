<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modelo extends Model
{
    use HasFactory;

    protected $table = 'modelos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    protected $fillable = [
        'modelo',
    ];
}
