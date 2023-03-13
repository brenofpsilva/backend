<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'cpf'       => $this->cpf,
            'phone'     => $this->phone,
            'knowledge' => $this->knowledge,
            'status'    => $this->status,
            'slug'      => str_replace(' ','',strtolower($this->name)),
        ];
    }
}
