<?php

namespace App\Repositories;

use App\Models\Assessment;

class AssessmentRepository
{
    protected $model;

    public function __construct(Assessment $model)
    {
        $this->model = $model;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function exists(int $senderId, int $commentId): bool
    {
        return $this->model
            ->where('comment_id', $commentId)
            ->where('sender_id', $senderId)
            ->exists();
    }
}
