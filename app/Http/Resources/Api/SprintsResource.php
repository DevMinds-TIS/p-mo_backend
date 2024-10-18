<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SprintsResource extends JsonResource
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
            'ID' => $this->idsprint,
            'ID Planificación' => $this->idplanning,
            'Fecha_Inicio' => Carbon::parse($this->startsprint)->format('d/m/Y'),
            'Fecha_Fin' => Carbon::parse($this->endsprint)->format('d/m/Y'),
            'Objetivo' => $this->goalsprint,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
