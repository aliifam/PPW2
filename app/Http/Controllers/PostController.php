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
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $total_comment_perpost = [];
        foreach ($posts as $post) {
            $total_comment_perpost[$post->id] = Comment::where('commentable_id', $post->id)->count();
        }
        return view('post.index', compact('posts', 'total_comment_perpost'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'body' => 'required|min:10',
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();

        toastr()->success('Post berhasil dibuat');

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $total_comment = Comment::where('commentable_id', $id)->count();
        return view('post.show', compact('post', 'total_comment'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'body' => 'required|min:10',
        ]);
        $post = Post::find($id);
        $this->authorize('update', $post);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        toastr()->success('Post berhasil diupdate');

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

        toastr()->success('Post berhasil dihapus');

        return redirect()->route('post.index');
    }

    public static function deleteAllUserPosts($id)
    {
        $posts = Post::where('user_id', $id)->get();
        foreach ($posts as $post) {
            $comments = Comment::where('commentable_id', $post->id)->get();
            if ($comments) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }
            $post->delete();
        }

        return;
    }

    public function currentUserPosts()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        $total_comment_perpost = [];
        foreach ($posts as $post) {
            $total_comment_perpost[$post->id] = Comment::where('commentable_id', $post->id)->count();
        }
        return view('post.my', compact('posts', 'total_comment_perpost'));
    }

    public function like($id)
    {
        $post = Post::find($id);
        $post->like(Auth::user()->id);
        return redirect()->back();
    }

    public function unlike($id)
    {
        $post = Post::find($id);
        $post->unlike(Auth::user()->id);
        return redirect()->back();
    }
}
