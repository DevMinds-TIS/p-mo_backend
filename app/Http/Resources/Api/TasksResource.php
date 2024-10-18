<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TasksResource extends JsonResource
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
            'ID' => $this->idtask,
            'ID Historia' => $this->idstorie,
            'ID Usuario' => $this->iduser,
            'Nombre' => $this->nametask,
            'Fecha_Inicio' => Carbon::parse($this->starttask)->format('d/m/Y'),
            'Fecha_Fin' => Carbon::parse($this->endtask)->format('d/m/Y'),
            'Estado' => $this->statustask,
            'Puntaje' => $this->scoretask,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
