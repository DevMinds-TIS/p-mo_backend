<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Rol' => $this->idrol,
            'Nombre_Rol' => $this->namerol,
            'Icono_Rol' => $this->iconrol,
            "Cantidad_Rol" => DB::table('role_user')->where('idrol', $this->idrol)->count(),
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
