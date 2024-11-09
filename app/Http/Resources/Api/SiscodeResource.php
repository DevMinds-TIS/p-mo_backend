<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SiscodeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Siscode' => $this->idsiscode,
            'ID_Espacio' => $this->idspace,
            'ID_User' => $this->iduser,
            'Código_SIS' => $this->siscode,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y - H:i:s'),
        ];
    }
}
