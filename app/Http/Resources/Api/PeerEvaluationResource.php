<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PeerEvaluationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Pares' => $this->idpe,
            'ID_Criterio' => $this->idcriteria,
            'ID_Usuario' => $this->iduser,
            'Fecha_Evaluación' => Carbon::parse($this->datepe)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
