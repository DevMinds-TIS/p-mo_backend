<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Tarea' => $this->idtask,
            'ID_Historia' => $this->idstorie,
            'ID_Usuario' => $this->iduser,
            'ID_Estado' => $this->idstatus,
            'Nombre_Tarea' => $this->nametask,
            'Fecha_Inicio' => $this->starttask ? $this->starttask->format('Y-m-d') : null,
            'Fecha_Fin' => $this->endtask ? $this->endtask->format('Y-m-d') : null,
            'Puntuación_Tarea' => $this->scoretask,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
