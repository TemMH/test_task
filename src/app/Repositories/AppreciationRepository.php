<?php

namespace App\Repositories;

use App\Models\Appreciation;

class AppreciationRepository
{
    protected $model;

    public function __construct(Appreciation $model)
    {
        $this->model = $model;
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }

    public function exists(int $senderId, int $recipientId): bool
    {
        return $this->model
            ->where('sender_id', $senderId)
            ->where('recipient_id', $recipientId)
            ->exists();
    }
}
