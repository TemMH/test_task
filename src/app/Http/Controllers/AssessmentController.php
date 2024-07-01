<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

use App\Http\Requests\Assessment\StoreRequest;
use App\Services\AssessmentService;
use App\Http\Resources\Comment\CommentResource;


class AssessmentController extends Controller
{

    /**
     * Comment Assessment 
     */

     protected $assessmentService;

     public function __construct(AssessmentService $assessmentService)
     {
         $this->assessmentService = $assessmentService;
     }

     public function commentAssessment(Request $request)
     {
         $result = $this->assessmentService->commentAssessment($request);
 
         if ($result['success']) {
             if ($result['action'] === 'removed') {
                 return response()->json(['success' => true, 'action' => 'removed']);
             } else {
                 return response()->json(['success' => true, 'comment' => new CommentResource($result['assessment']->comment)]);
             }
         } else {
             return response()->json(['success' => false, 'message' => 'Failed to assess comment'], 400);
         }
     }

}
