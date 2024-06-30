<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

use App\Http\Requests\Assessment\StoreRequest;
use App\Services\AssessmentService;

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

    public function commentlike(Request $request)
    {
        $result = $this->assessmentService->commentlike($request);

        if ($result['success']) {
            return back()->with('success', 'Лайк успешно отправлен.');
        } else {
            return back()->withErrors(['message' => $result['message']]);
        }
    }
    
    public function commentdislike(Request $request)
    {
        $result = $this->assessmentService->commentdislike($request);

        if ($result['success']) {
            return back()->with('success', 'Дизлайк успешно отправлен.');
        } else {
            return back()->withErrors(['message' => $result['message']]);
        }
    }

}
