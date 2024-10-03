<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;
    // Definir la tabla que el modelo usa
    protected $table = 'sprint';
    protected $primaryKey = 'idsprint'; // Indica que la clave primaria es 'idsprint'


    // Indicar los campos que son asignables de manera masiva
    protected $fillable = [
        'descripcion', 
        'fechainiciosprint', 
        'fechafinsprint', 
        'idequipo'
    ];

    // Indicar si el modelo tiene timestamps (created_at y updated_at)
    public $timestamps = true;

    // Relaciones
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'idequipo');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'sprint_id','idsprint');
    }
}

