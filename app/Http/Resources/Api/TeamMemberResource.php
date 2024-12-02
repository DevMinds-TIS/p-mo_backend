<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Miembro_Equipo' => $this->idteammember,
            'ID_Equipo' => $this->idteam,
            'ID_Usuario' => $this->iduser,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
