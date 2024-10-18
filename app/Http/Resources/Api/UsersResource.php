<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UsersResource extends JsonResource
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
            'ID Usuario' => $this->iduser,
            'Código SIS' => $this->idsiscode,
            'Docente ID' => $this->use_iduser,
            'Nombre' => $this->nameuser,
            'Apellido' => $this->lastnameuser,
            'Correo' => $this->emailuser,
            'Imagen Perfil' => $this->profileuser,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
