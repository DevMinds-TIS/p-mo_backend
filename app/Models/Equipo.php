<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $primaryKey = 'idequipo';

    protected $fillable = [
        'nombreequipo',
        'idestudiante',
    ];

    public function estudiante()
    {
        return $this->hasMany(Estudiante::class, 'idestudiante');
    }
}
