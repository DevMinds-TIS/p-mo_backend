<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Seguimiento' => $this->idtracking,
            'ID_Sprint' => $this->idsprint,
            'ID_Usuario' => $this->iduser,
            'ID_Estado' => $this->idstatus,
            'Nombre_Tracking' => $this->nametracking,
            'Fecha_Entrega' => $this->deliverytracking ? $this->deliverytracking->format('Y-m-d') : null,
            'Fecha_Devolución' => $this->returntracking ? $this->returntracking->format('Y-m-d') : null,
            'Comentario_Tracking' => $this->commenttracking,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
