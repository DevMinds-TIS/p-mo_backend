<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PeerEvaluationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Evaluación_Pares' => $this->idpe,
            'ID_Criterio' => $this->idcriteria,
            'ID_Usuario' => $this->iduser,
            'Fecha_Evaluación' => $this->datepe ? $this->datepe->format('d/m/Y') : null,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
