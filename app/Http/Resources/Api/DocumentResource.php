<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Documento' => $this->iddocument,
            'ID_Proyecto' => $this->idproject,
            'ID_Espacio' => $this->idspace,
            'ID_Planificación' => $this->idplanning,
            'ID_Seguimiento' => $this->idtracking,
            'ID_Historia' => $this->idstorie,
            'ID_Tarea' => $this->idtask,
            'ID_Equipo' => $this->idteam,
            'Nombre_Documento' => $this->namedocument,
            'Ruta_Documento' => $this->pathdocument,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
