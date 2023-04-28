<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Planet */
class PlanetResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
//            'rotation_period' => $this->rotation_period,
//            'diameter' => $this->diameter,
//            'gravity' => $this->gravity,
//            'population' => $this->population,
//            'terrain' => $this->terrain,
        ];
    }
}
