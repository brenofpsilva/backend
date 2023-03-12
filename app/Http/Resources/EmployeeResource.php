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
            'name'      => $this->name,
            'email'     => $this->email,
            'cpf'       => $this->cpf,
            'phone'     => $this->phone,
            'knowledge' => $this->knowledge,
            'status'    => $this->status,
        ];
    }
}