<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'governorate' => $this->governorate ? [
                'id' => $this->governorate->id,
                'name' => $this->governorate->name,
            ] : null,
            'parent_id' => $this->parent_id,
            'sub_services' => ServiceResource::collection($this->whenLoaded('subServices')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
