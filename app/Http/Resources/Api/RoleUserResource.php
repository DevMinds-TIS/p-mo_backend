<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "ID" => $this->idroleuser,
            "ID Miembro" => $this->idteammember,
            "ID Usuario" => $this->iduser,
            "ID Rol" => $this->idrol,
            "created_at" => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            "updated_at" => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
