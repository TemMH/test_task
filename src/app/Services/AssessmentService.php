<?php

namespace App\Services;

use App\Models\Assessment;
use App\Repositories\AssessmentRepository;
use Illuminate\Http\Request;

class AssessmentService
{
    protected $assessmentRepository;

    public function __construct(AssessmentRepository $assessmentRepository)
    {
        $this->assessmentRepository = $assessmentRepository;
    }

    public function commentlike(Request $request)
    {
        $senderId = $request->sender_id;
        $commentId = $request->comment_id;


        // $existingAssessment = $this->assessmentRepository->exists($senderId, $commentId);
        // if ($existingAssessment) {
        //     return ['success' => false, 'message' => 'Вы уже отправили благодарность этому пользователю.'];
        // }

        $assessmentData = [
            'sender_id' => $senderId,
            'comment_id' => $commentId,
            'status' => $request->status,
        ];

        $this->assessmentRepository->save($assessmentData);

        return ['success' => true];
    }

    public function commentdislike(Request $request)
    {
        $senderId = $request->sender_id;
        $commentId = $request->comment_id;


        // $existingAssessment = $this->assessmentRepository->exists($senderId, $commentId);
        // if ($existingAssessment) {
        //     return ['success' => false, 'message' => 'Вы уже отправили благодарность этому пользователю.'];
        // }

        $assessmentData = [
            'sender_id' => $senderId,
            'comment_id' => $commentId,
            'status' => $request->status,
        ];

        $this->assessmentRepository->save($assessmentData);

        return ['success' => true];
    }
}
