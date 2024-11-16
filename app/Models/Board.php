<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Board",
 *     description="Board model",
 *     @OA\Property(property="id", type="integer", description="The unique ID of the board"),
 *     @OA\Property(property="name", type="string", description="Name of the board"),
 *     @OA\Property(property="title", type="string", description="Title of the board"),
 *     @OA\Property(property="mobile", type="string", description="Mobile number of the board"),
 *     @OA\Property(property="email", type="string", format="email", description="Email address of the board"),
 *     @OA\Property(property="age", type="integer", description="Age"),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         enum={"sent_to_therapists", "preparing_offer", "first_contact", "unclaimed"},
 *         description="Status of the board"
 *     ),
 *     @OA\Property(property="created_at", type="string", format="date-time", description="Creation timestamp"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", description="Update timestamp")
 * )
 */

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'mobile',
        'email',
        'age',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
