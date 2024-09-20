<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $primaryKey = 'iddocente';
    protected $table = 'docente';
    protected $fillable = [
        'idactor',
    ];

    public function actor()
    {
        return $this->belongsTo(Actor::class, 'idactor');
    }

    // public function grupo()
    // {
    //     return $this->belongsTo(Grupo::class, 'idgrupo');
    // }

}
