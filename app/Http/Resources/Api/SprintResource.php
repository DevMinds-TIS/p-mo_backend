<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SprintResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Sprint' => $this->idsprint,
            'ID_Planificación' => $this->idplanning,
            'Fecha_Inicio' => $this->startsprint ? $this->startsprint->format('Y-m-d') : null,
            'Fecha_Fin' => $this->endsprint ? $this->endsprint->format('Y-m-d') : null,
            'Objetivo_Sprint' => $this->goalsprint,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
