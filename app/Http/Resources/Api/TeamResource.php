<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Equipo' => $this->idteam,
            'ID_Usuario' => $this->iduser,
            'ID_Espacio' => $this->idspace,
            'Nombre' => $this->nameteam,
            'Razón_Social' => $this->companyteam,
            'Correo' => $this->emailteam,
            'Logo' => $this->logoteam,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
