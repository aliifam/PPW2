@extends('layouts.base')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Blog Post</h1>
            @if (count($posts)>0)
                @foreach ($posts as $p)
                    <div class="well">
                        <h3><a href="/posts/{{$p->id}}">{{$p->title}}</a></h3>
                        <small>Tanggal: {{$p->created_at}}</small>
                    </div>
                @endforeach
            @else
                <p>Belum ada post</p>
            @endif
        </div>
    </div>
@endsection