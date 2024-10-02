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
        'idproyecto',
        'nombre',
        'descripcion',
        'fechainiciosprint',
        'fechafinsprint',
        ];
    // Relación con el modelo Project: un sprint pertenece a un proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'idproyecto');
    }
    // Relación con el modelo Task: un sprint tiene muchas tareas
    public function tarea()
    {
        return $this->hasMany(Tarea::class);
    }
    // Relación con el modelo File: un sprint tiene muchos archivos
    public function Documento()
    {
        return $this->hasMany(Documento::class);
    }
}


