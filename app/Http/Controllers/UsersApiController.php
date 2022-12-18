<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Users API",
 *      description="Api Docs for Get Users Data",
 *      @OA\Contact(
 *          email="me@aliif.space"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *        url="https://opensource.org/licenses/MIT"
 *    )
 * )
 */

class UsersApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/users",
     *      tags={"Users"},
     *      summary="Get all users",
     *      description="Returns all users",
     *      @OA\Response(
     *          response="default",
     *          description="Successful operation",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     * )
     */
    public function index()
    {
        $data = User::all();

        return response()->json($data);
    }

    /**
     * @OA\Get(
     *      path="/api/users/{username}",
     *      tags={"Users"},
     *      summary="Get user data",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="username",
     *          description="User username",
     *          required=true,
     *          in="path",
     *         @OA\Schema(
     *             type="string"
     *        )
     *      ),
     *      @OA\Response(
     *           response="default",
     *           description="Successful operation",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
     * )
     * 
     * 
     */

    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $comments = Comment::where('user_id', $user->id)->get();
        $posts = Post::where('user_id', $user->id)->get();

        $data = [
            'user' => $user,
            'comments' => $comments,
            'posts' => $posts
        ];

        return response()->json($data);
    }
}
