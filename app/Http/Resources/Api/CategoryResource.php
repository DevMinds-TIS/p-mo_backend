<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ID_Categoría' => $this->idcategory,
            'Nombre_Categoría' => $this->namecategory,
            'created_at' => $this->created_at->format('d/m/Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y - H:i:s'),
        ];
    }
}
