<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDocente';

    protected $fillable = [
        'idActor',
        'idGrupo',
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'idActor');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'idGrupo');
    }

}
