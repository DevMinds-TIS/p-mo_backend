<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class WeekliesResource extends JsonResource
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
            'ID' => $this->idweeklie,
            'ID Sprint' => $this->idsprint,
            'Objetivo' => $this->goalweeklie,
            'Fecha_Inicio' => Carbon::parse($this->startweeklie)->format('d/m/Y'),
            'Fecha_Fin' => Carbon::parse($this->endweeklie)->format('d/m/Y'),
            'Estado' => $this->statusweeklie,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}