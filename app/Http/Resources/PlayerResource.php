<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($request->has('sortBy'));
        return [
            'id' =>$this->id,
            'name' => $this->name,
            'age' => $this->age,
            'points' => $this->points,
            'address' => $this->address
        ];
    }
}
