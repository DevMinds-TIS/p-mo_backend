<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Rol_Usuario' => $this->idroleuser,
            'ID_Miembro_Equipo' => $this->idteammember,
            'ID_Usuario' => $this->iduser,
            'ID_Rol' => $this->idrol,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
