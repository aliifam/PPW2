@extends('layouts.app')

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
            <br>
            <br>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @if (count($posts)>0)
                    @foreach ($posts as $p)
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                @if($p->image)
                                    <img src="{{ Storage::url($p->image) }}" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$p->title}}</h5>
                                    <p>Tanggal: {{$p->created_at}}</p>
                                    <a href="/posts/{{$p->id}}" class="btn btn-primary">detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
            <br>
            <br>
                <div class="d-flex">
                    {{ $posts->links() }}
                </div>
            @else
                <p>Belum ada post</p>
            @endif
        </div>
    </div>
@endsection