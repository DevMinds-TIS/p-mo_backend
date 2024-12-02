<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Comentario' => $this->idcomment,
            'ID_Anuncio' => $this->idann,
            'Contenido_Comentario' => $this->contentcomment,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
