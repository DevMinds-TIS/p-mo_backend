<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo_empresa';
    protected $primaryKey = 'idequipo';

    protected $fillable = [
        'fotodelogoEquipo',
        'Nombredelequipo',
        'nombre_equipo_largo',
        'idestudiante',
        'idproyecto',
    ];

    public function estudiante()
    {
        return $this->hasMany(Estudiante::class, 'idestudiante');
    }

    // public function miembros()
    // {
    //     return $this->hasMany(Estudiante::class, 'idestudiante', 'idequipo')
    //         ->whereIn('idestudiante', [
    //             $this->miembro_1,
    //             $this->miembro_2,
    //             $this->miembro_3,
    //             $this->miembro_4,
    //             $this->miembro_5,
    //             $this->miembro_6
    //         ]);
    // }

    // Relación muchos a muchos con Actor, usando la tabla pivot equipo_actor
    public function actores()
    {
        return $this->belongsToMany(Actor::class, 'equipo_miembro', 'equipo_id', 'actor_id')
            ->withPivot('rol')  // Incluye el rol del actor
            ->withTimestamps();  // Incluye las marcas de tiempo
    }


}
