<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);
        $comments = Comment::where('commentable_id', $id)->get();
        if ($comments) {
            foreach ($comments as $comment) {
                $comment->delete();
            }
        }
        $post->delete();

        return redirect()->route('post.index');
    }
}
