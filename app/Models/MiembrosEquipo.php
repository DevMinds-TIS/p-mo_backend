<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiembrosEquipo extends Model
{
    use HasFactory;

    protected $table = 'miembros_equipo'; // Especifica el nombre de la tabla si es diferente al plural del modelo.

    protected $fillable = [
        'idproyecto',
        'user_id',
        'rol',
    ];

    // Relación con el modelo Proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'idproyecto');
    }

    // Relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
