<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;

    // Definimos la tabla que este modelo representará
    protected $table = 'sprints';

    // Campos que son asignables de manera masiva
    protected $fillable = [
        'project_id',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Relación con el modelo Project: un sprint pertenece a un proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'project_id');
    }

    // Relación con el modelo Task: un sprint tiene muchas tareas
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Relación con el modelo File: un sprint tiene muchos archivos
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
