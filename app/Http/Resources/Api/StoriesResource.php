<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StoriesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Historia' => $this->idstorie,
            'ID_Semana' => $this->idweeklie,
            'ID_Usuario' => $this->iduser,
            'Código_HU' => $this->codestorie,
            'Nombre_HU' => $this->namestorie,
            'Estado' => $this->statusstorie,
            'Puntos_HU' => $this->pointstorie,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
