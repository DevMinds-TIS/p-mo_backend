<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CriterionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Criterio' => $this->idcriteria,
            'ID_Categoría' => $this->idcategory,
            'Nombre_Criterio' => $this->namecriteria,
            'Puntuación_Criterio' => $this->scorecriteria,
            'Comentario_Criterio' => $this->commentcriteria,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
