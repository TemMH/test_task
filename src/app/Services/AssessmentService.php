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

    public function commentAssessment(Request $request)
    {
        $assessment = Assessment::where('comment_id', $request->comment_id)
            ->where('sender_id', $request->sender_id)
            ->first();

        if ($assessment) {

            if ($assessment->status == $request->status) {
                $assessment->delete();
                return ['success' => true, 'action' => 'removed'];
            } else {

                $assessment->update(['status' => $request->status]);
                return ['success' => true, 'action' => 'updated', 'assessment' => $assessment];
            }
        } else {

            $assessmentData = [
                'comment_id' => $request->comment_id,
                'sender_id' => $request->sender_id,
                'status' => $request->status,
            ];

            $assessment = Assessment::create($assessmentData);

            return ['success' => true, 'action' => 'added', 'assessment' => $assessment];
        }
    }
}
