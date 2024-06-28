<?php

namespace App\Http\Controllers;

use App\Models\Appreciation;
use App\Models\User;
use App\Models\Appreciation_type;
use App\Http\Requests\Apperciation\StoreRequest;
use Illuminate\Http\Request;

class AppreciationController extends Controller
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
    public function store(StoreRequest $request)
    {
        Appreciation::create($request->validated());

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Appreciation $appreciation)
    {
        //
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
