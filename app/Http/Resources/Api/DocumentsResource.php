<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentsResource extends JsonResource
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
            'ID' => $this->iddocument,
            'ID Proyecto' => $this->idproject,
            'ID Espacio' => $this->idspace,
            'ID Pacificación' => $this->idplanning,
            'ID Seguimiento' => $this->idtracking,
            'ID Historia' => $this->idstorie,
            'ID Tarea' => $this->idtask,
            'Dirección' => $this->pathdocument,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
