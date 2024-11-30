<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ScoreResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Puntuación' => $this->idscore,
            'ID_Tarea' => $this->idtask,
            'ID_Evaluación_Cruzada' => $this->idce,
            'ID_Autoevaluación' => $this->idsa,
            'ID_Evaluación_Pares' => $this->idpe,
            'ID_Equipo' => $this->idteam,
            'ID_Usuario' => $this->iduser,
            'ID_Sprint' => $this->idsprint,
            'ID_Seguimiento' => $this->idtracking,
            'ID_Semana' => $this->idweeklie,
            'Puntuación' => $this->pointscore,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
