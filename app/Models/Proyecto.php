<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla
    protected $table = 'proyecto';

    // Definir la clave primaria
    protected $primaryKey = 'idproyecto';

    // Especificar si la clave primaria es auto-incrementable
    public $incrementing = true;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombreproyecto',        // Nombre del proyecto
        'codigo',                // Código del proyecto
        'invitacionproyecto',    // Ruta para el archivo de invitación
        'pliegoproyecto',    // Ruta para el archivo del pliego de especificaciones
        'listaInscrito',    // Ruta para el archivo del pliego de especificaciones
        'fechainicioproyecto',   // Fecha de inicio del proyecto
        'fechafinproyecto',      // Fecha de fin del proyecto
        'fechainicioinscripcion',   // Fecha de inicio del proyecto
        'fechafininscripcion'

    ];
}
