<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $primaryKey = 'idActor';
    protected $fillable = [
        'nombreActor',
        'apellidoActor',
        'correoActor',
        'claveActor',
        'fotoPerfilActor',
    ];

    public function docente()
    {
        return $this->hasOne(Docente::class, 'idActor');
    }

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'idActor');
    }

}