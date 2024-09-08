<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $primaryKey = 'idEstudiante';
    protected $fillable = [
        'idActor',       
        'idEquipo',      
        'idGrupo',       
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'idActor');
    }
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'idEquipo');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'idGrupo');
    }
}