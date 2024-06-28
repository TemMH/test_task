<?php

namespace App\Services;

use App\Models\Appreciation;
use App\Repositories\AppreciationRepository;
use Illuminate\Http\Request;

class AppreciationService
{
    protected $appreciationRepository;

    public function __construct(AppreciationRepository $appreciationRepository)
    {
        $this->appreciationRepository = $appreciationRepository;
    }

    public function store(Request $request)
    {
        $senderId = $request->sender_id;
        $recipientId = $request->recipient_id;

        // Проверяем, отправлял ли пользователь благодарность ранее
        $existingAppreciation = $this->appreciationRepository->exists($senderId, $recipientId);

        // Если благодарность уже была отправлена, возвращаем ошибку
        if ($existingAppreciation) {
            return ['success' => false, 'message' => 'Вы уже отправили благодарность этому пользователю.'];
        }

        $appreciationData = [
            'sender_id' => $senderId,
            'recipient_id' => $recipientId,
            'appreciation_type_id' => $request->appreciation_type_id,
        ];

        $this->appreciationRepository->save($appreciationData);

        return ['success' => true];
    }
}
