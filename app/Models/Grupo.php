<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $primaryKey = 'idGrupo';
    protected $fillable = [
        'nombreGrupo',
    ];
    public function estudiante()
    {
        return $this->hasMany(Estudiante::class, 'idGrupo');
    }
    public function docente()
    {
        return $this->hasMany(Docente::class, 'idGrupo');
    }

}