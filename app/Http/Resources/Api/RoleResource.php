<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "ID_Rol" => $this->idrol,
            "Nombre" => $this->namerol,
            "Icono" => $this->iconrol,
            "Cantidad" => DB::table('role_user')->where('idrol', $this->idrol)->count(),
            "created_at" => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            "updated_at" => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
