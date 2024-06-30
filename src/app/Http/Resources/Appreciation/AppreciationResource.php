<?php

namespace App\Http\Resources\Appreciation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppreciationResource extends JsonResource
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
            'sender' => $this->sender,
            'recipient' => $this->recipient,
            'appreciation_type' => $this->appreciationType,
            'date' => $this->created_at->diffForHumans(),

        ];
    }
}
