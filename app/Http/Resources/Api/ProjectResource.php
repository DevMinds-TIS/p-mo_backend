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
            'Fecha_Inicio' => Carbon::parse($this->startproject)->format('Y-m-d'),
            'Fecha_Fin' => Carbon::parse($this->endproject)->format('Y-m-d'),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d - H:i:s'),
        ];
    }
}
