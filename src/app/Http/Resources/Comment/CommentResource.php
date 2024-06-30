<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'appreciation' => $this->appreciation,
            'sender' => $this->sender,
            'comment_text' => $this->comment_text,
            'date' => $this->created_at->diffForHumans(),

        ];
    }
}
