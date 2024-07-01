<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Models\Appreciation;
use App\Models\Appreciation_type;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();

        $users = UserResource::collection($users)->resolve();

        return inertia('User/Index', compact('users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $appreciation_types = Appreciation_type::query()
        ->withCount(['appreciations_user' => function ($query) use ($user) {
            $query->where('recipient_id', $user->id);
        }])
        ->get();

        $hasSentAppreciation = Appreciation::where('sender_id', auth()->id())
        ->where('recipient_id', $user->id)
        ->exists();

        return inertia('User/Show', compact('user','appreciation_types','hasSentAppreciation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
