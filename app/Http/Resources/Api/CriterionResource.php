<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CriterionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Criterio' => $this->idcriteria,
            'Nombre' => $this->namecriteria,
            'Puntaje' => $this->scorecriteria,
            'Justificación' => $this->commentcriteria,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
