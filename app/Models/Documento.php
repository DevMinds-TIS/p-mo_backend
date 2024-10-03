<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'sprint_id', 
        'nombre', 
        'tipo', 
        'ruta', 
        'fecha_subida', 
        'estado', 
        'fecha_revision'
    ];

    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'sprint_id');
    }
}

