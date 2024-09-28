<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
   // Definimos la tabla que este modelo representará
   protected $table = 'files';

   // Campos que son asignables de manera masiva
   protected $fillable = [
       'sprint_id',
       'file_name',
       'file_path',
       'status',
       'uploaded_at',
   ];

   // Relación con el modelo Sprint: un archivo pertenece a un sprint
   public function sprint()
   {
       return $this->belongsTo(Sprint::class);
   }
}