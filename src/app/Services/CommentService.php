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
        $commentData = [
            'appreciation_id' => $request->appreciation_id,
            'sender_id' => $request->sender_id,
            'comment_text' => $request->comment_text,
        ];

        $comment = $this->commentRepository->save($commentData);

        return ['success' => true, 'comment' => $comment];
    }
}
