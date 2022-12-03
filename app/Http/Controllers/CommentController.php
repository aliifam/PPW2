<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user()->associate(Auth::user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return redirect()->back();
    }

    public function replyStore(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user()->associate(Auth::user());
        $comment->parent_id = $request->comment_id;
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return redirect()->back();
    }
}
