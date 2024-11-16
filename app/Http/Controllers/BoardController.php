<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Requests\StoreboardRequest;
use App\Http\Requests\UpdateboardRequest;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Board::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoardRequest $request)
    {
        $validated = $request->validated();
        $data = board::create($validated);
        return response()->json($data, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardRequest $request, Board $member)
    {
        if (!$member) {
            return response()->json(['error' => 'Board not found'], 404);
        }
        $validated = $request->validated();
        $member->update($validated);
        return response()->json($member, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $member)
    {
        $member->delete();
        return response()->json(null, 204);
    }
}
