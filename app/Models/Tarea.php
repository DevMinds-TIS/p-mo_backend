<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    // Definimos la tabla que este modelo representará
    protected $table = 'tasks';
    // Campos que son asignables de manera masiva
    protected $fillable = [
        'idtarea',
        'sprint_id',
        'idhistoria',
        'nombretarea',
        'estado',
        'progreso',
        'asignado_a',
        'puntos',
        'rol',
        'descripciontarea',
        'fechainiciotarea',
        'fechafintarea',
        'mockuptarea',
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
