<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollaboratorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => str_replace('-','',$this->uuid),
            'name' => $this->name,
            'slug' => str_replace(' ','',strtolower($this->name)),
        ];
    }
}
