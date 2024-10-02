<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    // Definimos la tabla que este modelo representará
    protected $table = 'equipo_empresa';
    
    // Clave primaria personalizada
    protected $primaryKey = 'idequipo';

    // Campos asignables masivamente
    protected $fillable = [
        'fotodelogoEquipo',
        'Nombredelequipo',
        'nombre_equipo_largo',
        'idproyecto'
    ];

    // Relación con el modelo Proyecto: un equipo pertenece a un proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'idproyecto');
    }

    // Relación con el modelo MiembroEquipo: Un equipo tiene muchos miembros
    public function miembros()
    {
        return $this->hasMany(MiembroEquipo::class, 'idequipo');
    }
}
