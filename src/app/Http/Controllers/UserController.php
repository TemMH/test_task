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

}
