<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class SpaceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Espacio' => $this->idspace,
            'ID_Proyecto' => $this->idproject,
            'ID_Usuario' => $this->iduser,
            'Nombre_Espacio' => $this->namespace,
            'Inscritos' => DB::table('siscode')->where('idspace', $this->idspace)->count(),
            'Fecha_Inicio' => $this->startspace ? $this->startspace->format('Y-m-d') : null,
            'Fecha_Fin' => $this->endspace ? $this->endspace->format('Y-m-d') : null,
            'Límite_Espacio' => $this->limitspace,
            'Fecha_Inicio_Registro' => $this->starregistrationspace ? $this->starregistrationspace->format('Y-m-d') : null,
            'Fecha_Fin_Registro' => $this->endregistrationspace ? $this->endregistrationspace->format('Y-m-d') : null,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
