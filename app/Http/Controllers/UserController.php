<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('user.index', compact('users'));
    }

    public function show($username)
    {
        
        $username = str_replace('@', '', $username);
        $id = User::where('username', $username)->first()->id;
        $user = User::find($id);
        $user_posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $user_comments = Comment::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return view('user.show', compact('user', 'user_posts', 'user_comments'));
    }
}
