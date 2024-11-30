<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Usuario' => $this->iduser,
            'ID_Siscode' => $this->idsiscode,
            // 'ID_Siscode' => new SiscodeResource($this->idsiscode),
            'ID_Permiso' => $this->idpermission,
            'ID_Docente' => $this->use_iduser,
            'Nombre' => $this->nameuser,
            'Apellido' => $this->lastnameuser,
            'Correo' => $this->emailuser,
            'Perfil' => $this->profileuser,
            'ID_Rol' => $this->idrol,
            'Roles' => $this->roles->map(function ($role) {
                return [
                    'ID_Rol' => $role->idrol,
                    'Nombre_Rol' => $role->namerol,
                    'Icono_Rol' => $role->iconrol,
                ];
            }),
            'Docente' => new UserResource($this->whenLoaded('user')),
            'Permiso_Docente' => $this->teacherpermission,
            'Código_SIS' => $this->siscode,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}