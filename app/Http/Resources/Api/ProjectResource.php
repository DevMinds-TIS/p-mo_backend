<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Proyecto' => $this->idproject,
            'ID_Usuario' => $this->iduser,
            'Proyecto' => $this->nameproject,
            'Código' => $this->codeproject,
            'Fecha_Inicio' => Carbon::parse($this->startproject)->format('d/m/Y'),
            'Fecha_Fin' => Carbon::parse($this->endproject)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
