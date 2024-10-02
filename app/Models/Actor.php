<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actor';
    protected $primaryKey = 'idactor';
    public $incrementing = true;
    protected $fillable = [
        'nombreactor',
        'apellidoactor',
        'correoactor',
        'claveactor',
        'fotoperfilactor',
    ];

    // Relación uno a uno con Docente
    public function docente()
    {
        return $this->hasOne(Docente::class, 'idactor');
    }

    // Relación muchos a muchos con Equipo a través de la tabla pivot equipo_actor
    public function equipos()
    {
        // Cambiamos 'equipo_miembro' por 'equipo_actor'
        return $this->belongsToMany(Equipo::class, 'equipo_actor', 'actor_id', 'equipo_id')
            ->withPivot('rol')  // Incluye la columna 'rol' del pivot
            ->withTimestamps();  // Incluye timestamps
    }
}