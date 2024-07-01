<?php

namespace App\Http\Controllers;


use App\Models\Appreciation;
use App\Models\User;

use App\Models\Comment;
use App\Http\Requests\Comment\StoreRequest;
use App\Services\CommentService;
use App\Http\Resources\Comment\CommentResource;


use Illuminate\Http\Request;

class CommentController extends Controller
{

     protected $commentService;

     public function __construct(CommentService $commentService)
     {
         $this->commentService = $commentService;
     }

    public function store(Request $request)
    {
        $result = $this->commentService->store($request);

        if ($result['success']) {
            return response()->json([
                'success' => true, 
                'comment' => new CommentResource($result['comment'])
            ]);
        } else {
            return response()->json([
                'success' => false, 
                'message' => $result['message']
            ], 400);
        }
    }


}
