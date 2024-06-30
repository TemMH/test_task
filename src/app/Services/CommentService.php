<?php

namespace App\Services;


use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store(Request $request)
    {
        $senderId = $request->sender_id;
        $appreciationId = $request->appreciation_id;

        $commentData = [
            'appreciation_id' => $appreciationId,
            'sender_id' => $senderId,

            'comment_text' => $request->comment_text,
        ];

        $this->commentRepository->save($commentData);

        return ['success' => true];
    }
}
