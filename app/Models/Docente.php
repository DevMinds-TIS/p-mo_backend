<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $primaryKey = 'iddocente';

    protected $fillable = [
        'idactor',
        'idgrupo',
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'idactor');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'idgrupo');
    }

}
