<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Usuario' => $this->iduser,
            'ID_Siscode' => $this->idsiscode,
            'ID_Docente' => $this->use_iduser,
            'Nombre' => $this->nameuser,
            'Apellido' => $this->lastnameuser,
            'Correo' => $this->emailuser,
            'Imagen_Perfil' => $this->profileuser,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
