<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanningResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Planificación' => $this->idplanning,
            'ID_Equipo' => $this->idteam,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
