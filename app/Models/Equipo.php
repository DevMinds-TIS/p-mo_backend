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
        'miembro_1',
        'miembro_2',
        'miembro_3',
        'miembro_4',
        'miembro_5',
        'miembro_6',
    ];

    public function estudiante()
    {
        return $this->hasMany(Estudiante::class, 'idestudiante');
    }

    public function miembros()
    {
        return $this->hasMany(Estudiante::class, 'idestudiante', 'idequipo')
            ->whereIn('idestudiante', [
                $this->miembro_1,
                $this->miembro_2,
                $this->miembro_3,
                $this->miembro_4,
                $this->miembro_5,
                $this->miembro_6
            ]);
    }
}
