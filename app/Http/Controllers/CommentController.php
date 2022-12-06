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
        $this->middleware(['auth', 'verified']);
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
        $reply = new Comment;
        $reply->body = $request->body;
        $reply->user()->associate(Auth::user());
        $reply->parent_id = $request->comment_id;
        $post = Post::find($request->post_id);
        $post->comments()->save($reply);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $this->authorize('delete', $comment);
        $comment->deleteWithReplies();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $this->authorize('update', $comment);
        $comment->body = $request->body;
        $comment->save();

        return redirect()->back();
    }
}