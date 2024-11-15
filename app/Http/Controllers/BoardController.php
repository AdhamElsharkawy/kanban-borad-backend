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
    public function update(UpdateBoardRequest $request, Board $board)
    {
        if (!$board) {
            return response()->json(['error' => 'Board not found'], 404);
        }
        $validated = $request->validated();
        $board->update($validated);
        return response()->json($board, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        $board->delete();
        return response()->json(null, 204);
    }
}
