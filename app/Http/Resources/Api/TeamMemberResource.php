<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Miembro' => $this->idteammember,
            'ID_Equipo' => $this->idteam,
            'ID_Usuario' => $this->iduser,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
