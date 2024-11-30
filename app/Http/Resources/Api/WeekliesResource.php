<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class WeekliesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Semana' => $this->idweeklie,
            'ID_Sprint' => $this->idsprint,
            'ID_Estado' => $this->idstatus,
            'Objetivo_Semanal' => $this->goalweeklie,
            'Fecha_Inicio' => $this->startweeklie ? $this->startweeklie->format('Y-m-d') : null,
            'Fecha_Fin' => $this->endweeklie ? $this->endweeklie->format('Y-m-d') : null,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
