<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Documento' => $this->iddocument,
            'ID_Proyecto' => $this->idproject,
            'ID_Espacio' => $this->idspace,
            'ID_Pacificación' => $this->idplanning,
            'ID_Seguimiento' => $this->idtracking,
            'ID_Historia' => $this->idstorie,
            'ID_Tarea' => $this->idtask,
            'Dirección' => $this->pathdocument,
            'Nombre' => $this->namedocument,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
