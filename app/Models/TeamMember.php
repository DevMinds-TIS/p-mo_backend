<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    // Definimos la tabla que este modelo representará
    protected $table = 'team_members';

    // Campos que son asignables de manera masiva
    protected $fillable = [
        'project_id',
        'user_id',
        'rol',
    ];

    // Relación con el modelo Project: un miembro de equipo pertenece a un proyecto
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relación con el modelo User: un miembro de equipo está representado por un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
