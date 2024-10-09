<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoMiembro extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla
    protected $table = 'equipo_miembro';

    // Clave primaria
    protected $primaryKey = 'id';

    // Definir si el ID es autoincremental
    public $incrementing = true;

    // Tipos de datos de las columnas clave
    protected $keyType = 'int';

    // Desactivar los timestamps si no los necesitas
    public $timestamps = true;

    // Definir los campos que se pueden asignar de manera masiva
    protected $fillable = [
        'equipo_id',
        'actor_id',
        'rol',
    ];

    // Relaciones con otros modelos

    /**
     * Relación con el modelo Equipo.
     * Un miembro pertenece a un equipo.
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id', 'idequipo');
    }

    /**
     * Relación con el modelo Actor.
     * Un miembro es un actor.
     */
    public function actor()
    {
        return $this->belongsTo(Actor::class, 'actor_id', 'idactor');
    }
}
