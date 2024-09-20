<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiante';
    protected $primaryKey = 'idestudiante';
    protected $fillable = [
        'idactor',
        // 'idequipo',
        // 'idgrupo',
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'idactor');
    }
    // public function equipo()
    // {
    //     return $this->belongsTo(Equipo::class, 'idequipo');
    // }

    // public function grupo()
    // {
    //     return $this->belongsTo(Grupo::class, 'idgrupo');
    // }
}