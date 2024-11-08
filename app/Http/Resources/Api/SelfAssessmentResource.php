<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SelfAssessmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Autoevaluación' => $this->idsa,
            'ID_Criterio' => $this->idcriteria,
            'ID_Usuario' => $this->iduser,
            'ID_Planificación' => $this->idplanning,
            'Fecha_Evaluación' => Carbon::parse($this->datesa)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
