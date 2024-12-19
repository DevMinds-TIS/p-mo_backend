<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Proyecto' => $this->idproject,
            'ID_Usuario' => $this->iduser,
            'Nombre_Proyecto' => $this->nameproject,
            'Código_Proyecto' => $this->codeproject,
            'Documentos' => DocumentResource::collection($this->whenLoaded('documents')),
            'Gestión_Proyecto' => $this->termproject,
            'Fecha_Inicio' => $this->startproject ? $this->startproject->format('Y-m-d') : null,
            'Fecha_Fin' => $this->endproject ? $this->endproject->format('Y-m-d') : null,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
