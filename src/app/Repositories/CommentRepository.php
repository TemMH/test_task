<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function exists(int $senderId, int $appreciationId): bool
    {
        return $this->model
            ->where('sender_id', $senderId)
            ->where('appreciation_id', $appreciationId)
            ->exists();
    }
}
