@extends('layouts.base')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>{{$posts->title}}</h1>
            <small>Tanggal: {{$posts->created_at}}</small>
            <p>{{$posts->description}}</p>
            <div class="d-flex">
                <a class="btn btn-primary" style="margin-right: 10px" href="{{$posts->id}}/edit">Edit</a>
                <form action="{{route('posts.destroy', $posts->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection