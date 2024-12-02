<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CrossEvaluationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Evaluación_Cruzada' => $this->idce,
            'ID_Planificación' => $this->idplanning,
            'ID_Criterio' => $this->idcriteria,
            'ID_Equipo' => $this->idteam,
            'Fecha_Evaluación' => $this->datece ? $this->datece->format('d/m/Y') : null,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
