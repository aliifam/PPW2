@extends('layouts.base')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Blog Post</h1>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a class="btn btn-primary" href="{{route('posts.create')}}">Add Blog Post</a>
            @if (count($posts)>0)
                @foreach ($posts as $p)
                    <div class="well">
                        <h3><a href="/posts/{{$p->id}}">{{$p->title}}</a></h3>
                        <small>Tanggal: {{$p->created_at}}</small>
                    </div>
                @endforeach
                <div class="d-flex">
                    {{ $posts->links() }}
                </div>
            @else
                <p>Belum ada post</p>
            @endif
        </div>
    </div>
@endsection