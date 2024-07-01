<?php

namespace App\Http\Controllers;

use App\Models\Appreciation;
use App\Models\User;
use App\Models\Appreciation_type;
use App\Services\AppreciationService;
use App\Http\Requests\Apperciation\StoreRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Appreciation\AppreciationResource;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;

class AppreciationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexUser(User $user)
    {
        $appreciation_types = Appreciation_type::all();
        
        $appreciations_user = Appreciation::where('recipient_id', $user->id)->get();

        $appreciations_user = AppreciationResource::collection($appreciations_user)->resolve();

        
        return inertia('Appreciation/IndexUser', compact('user','appreciations_user','appreciation_types'));
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

     protected $appreciationService;

     public function __construct(AppreciationService $appreciationService)
     {
         $this->appreciationService = $appreciationService;
     }

    public function store(StoreRequest $request)
    {
        $result = $this->appreciationService->store($request);

        if ($result['success']) {
            return back()->with('success', 'Благодарность успешно отправлена.');
        } else {
            return back()->withErrors(['message' => $result['message']]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appreciation $appreciation)
    {

        $appreciation_comments = Comment::where('appreciation_id', $appreciation->id)->get();

        $appreciation_comments = CommentResource::collection($appreciation_comments)->resolve();
        
        $comments = $appreciation_comments;

        $appreciation = new AppreciationResource($appreciation);

        return inertia('Appreciation/Show', ['appreciation' => $appreciation, 'comments' => $comments]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appreciation $appreciation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appreciation $appreciation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appreciation $appreciation)
    {
        //
    }
}
