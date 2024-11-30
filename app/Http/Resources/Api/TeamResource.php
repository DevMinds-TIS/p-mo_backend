<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Equipo' => $this->idteam,
            'ID_Espacio' => $this->idspace,
            'ID_Usuario' => $this->iduser,
            'Nombre_Equipo' => $this->nameteam,
            'Razón_Social' => $this->companyteam,
            'Correo_Equipo' => $this->emailteam,
            'Logo_Equipo' => $this->logoteam,
            'Repositorio_Equipo' => $this->repositoryteam,
            'Despliegue_Local' => $this->localdeployteam,
            'Despliegue_Externo' => $this->externaldeployteam,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
