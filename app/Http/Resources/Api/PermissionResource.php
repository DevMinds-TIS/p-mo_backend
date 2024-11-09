<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "ID_Permiso" => $this->idpermission,
            "ID_User" => $this->iduser,
            "Permiso" => $this->teacherpermission,
            "created_at" => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            "updated_at" => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
