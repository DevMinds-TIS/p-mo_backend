<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actor';
    protected $primaryKey = 'idactor';
    public $incrementing = true;
    protected $fillable = [
        'nombreactor',
        'apellidoactor',
        'correoactor',
        'claveactor',
        'fotoperfilactor',
    ];

    // Relación uno a uno con Docente
    public function docente()
    {
        return $this->hasOne(Docente::class, 'idactor');
    }

}