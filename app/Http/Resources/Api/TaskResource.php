<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Tarea' => $this->idtask,
            'ID_Historia' => $this->idstorie,
            'ID_Usuario' => $this->iduser,
            'Nombre' => $this->nametask,
            'Fecha_Inicio' => Carbon::parse($this->starttask)->format('d/m/Y'),
            'Fecha_Fin' => Carbon::parse($this->endtask)->format('d/m/Y'),
            'Estado' => $this->statustask,
            'Puntaje' => $this->scoretask,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
