<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SpaceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Espacio' => $this->idspace,
            'ID_Proyecto' => $this->idproject,
            'ID_Usuario' => $this->iduser,
            'Nombre' => $this->namespace,
            'Fecha_Inicio' => Carbon::parse($this->startspace)->format('d/m/Y'),
            'Fecha_Fin' => Carbon::parse($this->endspace)->format('d/m/Y'),
            'Limite_Equipo' => $this->limitspace,
            'Inicio_Registro' => Carbon::parse($this->starregistrationspace)->format('d/m/Y'),
            'Fin_Registro' => Carbon::parse($this->endregistrationspace)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
