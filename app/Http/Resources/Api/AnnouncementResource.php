<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Anuncio' => $this->idann,
            'ID_Proyecto' => $this->idproject,
            'ID_Espacio' => $this->idspace,
            'ID_Estado' => $this->idstatus,
            'Titulo' => $this->titleann,
            'Cuerpo' => $this->contentann,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
