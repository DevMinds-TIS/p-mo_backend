<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Notificación' => $this->idnotification,
            'ID_Usuario' => $this->iduser,
            'ID_Estado' => $this->idstatus,
            'Mensaje_Notificación' => $this->messagenotification,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
