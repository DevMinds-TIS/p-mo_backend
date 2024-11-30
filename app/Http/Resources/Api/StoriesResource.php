<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class StoriesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Historia' => $this->idstorie,
            'ID_Semana' => $this->idweeklie,
            'ID_Usuario' => $this->iduser,
            'ID_Estado' => $this->idstatus,
            'Código_Historia' => $this->codestorie,
            'Nombre_Historia' => $this->namestorie,
            'Puntos_Historia' => $this->pointstorie,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
