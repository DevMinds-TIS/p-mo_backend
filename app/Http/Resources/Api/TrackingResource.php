<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID' => $this->idtracking,
            'ID Sprint' => $this->idsprint,
            'ID Usuario' => $this->iduser,
            'Nombre' => $this->nametracking,
            'Fecha_Envió' => Carbon::parse($this->deliverytracking)->format('d/m/Y'),
            'Fecha_Recepción' => Carbon::parse($this->returntracking)->format('d/m/Y'),
            'Estado' => $this->statustracking,
            'Comentario' => $this->commenttracking,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
