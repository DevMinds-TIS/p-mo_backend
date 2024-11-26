<?php

namespace App\Http\Resources\Api;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class SpaceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Espacio' => $this->idspace,
            'ID_Proyecto' => $this->idproject,
            'ID_Usuario' => $this->iduser,
            'Nombre' => $this->namespace,
            'Fecha_Inicio' => Carbon::parse($this->startspace)->format('Y-m-d'),
            'Fecha_Fin' => Carbon::parse($this->endspace)->format('Y-m-d'),
            'Limite_Equipo' => $this->limitspace,
            'Inicio_Registro' => Carbon::parse($this->starregistrationspace)->format('Y-m-d'),
            'Fin_Registro' => Carbon::parse($this->endregistrationspace)->format('Y-m-d'),
            'Inscritos' => DB::table('siscode')->where('idspace', $this->idspace)->count(),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d - H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d - H:i:s'),
        ];
    }
}
