<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class SiscodeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Siscode' => $this->idsiscode,
            'ID_Espacio' => $this->idspace,
            'ID_Usuario' => $this->iduser,
            'Código_SIS' => $this->siscode,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
