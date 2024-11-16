<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Requests\StoreboardRequest;
use App\Http\Requests\UpdateboardRequest;


/**
 * @OA\Info(
 *     title="Board Management API",
 *     version="1.0.0",
 *     description="API documentation for managing boards and members."
 * )
 * @OA\Tag(
 *     name="Boards",
 *     description="API Endpoints for Managing Boards"
 * )
 */

class BoardController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/members",
     *     tags={"Boards"},
     *     summary="Get all boards",
     *     @OA\Response(
     *         response=200,
     *         description="A list of boards",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Board"))
     *     )
     * )
     */
    public function index()
    {
        $data = Board::all();
        return response()->json($data);
    }

    /**
     * @OA\Post(
     *     path="/api/members",
     *     tags={"Boards"},
     *     summary="Create a new board",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "title", "mobile", "email", "age"},
     *             @OA\Property(property="name", type="string", maxLength=255, example="John Doe"),
     *             @OA\Property(property="title", type="string", maxLength=50, example="Manager"),
     *             @OA\Property(property="mobile", type="string", example="1234567890"),
     *             @OA\Property(property="email", type="string", format="email", example="johndoe@example.com"),
     *             @OA\Property(property="age", type="integer", minimum=18, maximum=120, example=30),
     *             @OA\Property(
     *                 property="status",
     *                 type="string",
     *                 enum={"sent_to_therapists", "preparing_offer", "first_contact", "unclaimed"},
     *                 example="first_contact",
     *                 description="Optional status of the board"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Board created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Board")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(property="email", type="array", @OA\Items(type="string", example="The email has already been taken."))
     *             )
     *         )
     *     )
     * )
     */
    public function store(StoreBoardRequest $request)
    {
        $validated = $request->validated();
        $data = board::create($validated);
        return response()->json($data, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/members/{id}",
     *     tags={"Boards"},
     *     summary="Update an existing board",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the board to update",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "title", "mobile", "email", "age", "status"},
     *             @OA\Property(property="name", type="string", maxLength=255, example="Jane Doe"),
     *             @OA\Property(property="title", type="string", maxLength=50, example="Director"),
     *             @OA\Property(property="mobile", type="string", example="0987654321"),
     *             @OA\Property(property="email", type="string", format="email", example="janedoe@example.com"),
     *             @OA\Property(property="age", type="integer", minimum=18, maximum=120, example=40),
     *             @OA\Property(
     *                 property="status",
     *                 type="string",
     *                 enum={"sent_to_therapists", "preparing_offer", "first_contact", "unclaimed"},
     *                 example="preparing_offer"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Board updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Board")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Board not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Board not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(property="mobile", type="array", @OA\Items(type="string", example="The mobile number has already been taken."))
     *             )
     *         )
     *     )
     * )
     */
    public function update(UpdateBoardRequest $request, Board $member)
    {
        $validated = $request->validated();
        $member->update($validated);
        return response()->json($member, 200);
    }

 /**
     * @OA\Delete(
     *     path="/api/members/{id}",
     *     tags={"Boards"},
     *     summary="Delete an existing board",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the board to delete",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Board deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Board not found"
     *     )
     * )
     */
    public function destroy(Board $member)
    {
        $member->delete();
        return response()->json(null, 204);
    }
}
