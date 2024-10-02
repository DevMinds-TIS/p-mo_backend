<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    // Definimos la tabla que este modelo representará
    protected $table = 'documentos';

    // Campos que son asignables de manera masiva
    protected $fillable = [
        'sprint_id',
        'nombredocumento',
        'rutadocumento',
        'estado',
        'uploaded_at',
    ];

    // Relación con el modelo Sprint: un documento pertenece a un sprint
    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}

