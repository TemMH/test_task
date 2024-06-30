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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

     protected $commentService;

     public function __construct(CommentService $commentService)
     {
         $this->commentService = $commentService;
     }

    public function store(Request $request)
    {
        $result = $this->commentService->store($request);

        if ($result['success']) {
            return back()->with('success', 'Комментарий успешно отправлен.');
        } else {
            return back()->withErrors(['message' => $result['message']]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
