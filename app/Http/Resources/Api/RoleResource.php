<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "ID_Rol" => $this->idrol,
            "Nombre" => $this->namerol,
            "Icono" => $this->iconrol,
            "created_at" => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            "updated_at" => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
