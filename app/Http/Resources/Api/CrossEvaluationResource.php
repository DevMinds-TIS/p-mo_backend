<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CrossEvaluationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Cruzada' => $this->idce,
            'ID_Planificación' => $this->idplanning,
            'ID_Criterio' => $this->idcriteria,
            'ID_Equipo' => $this->idteam,
            'Fecha_Evaluación' => Carbon::parse($this->datece)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
