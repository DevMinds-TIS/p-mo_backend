<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Definimos la tabla que este modelo representará
    protected $table = 'tasks';

    // Campos que son asignables de manera masiva
    protected $fillable = [
        'sprint_id',
        'nombre',
        'status',
        'progreso',
        'asignado_a',
        'puntos',
        'rol',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Relación con el modelo Sprint: una tarea pertenece a un sprint
    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }

    // Relación con el modelo User: una tarea puede ser asignada a un usuario
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }
}