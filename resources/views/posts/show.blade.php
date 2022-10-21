@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>{{$posts->title}}</h1>
            <small>Created at: {{$posts->created_at}}</small>
            <br>
            <small>Edited at: {{$posts->updated_at}}</small>
            <p>{{$posts->description}}</p>
            <div class="d-flex">
                <a href="/posts" class="btn btn-primary"style="margin-right: 10px">Back</a>
                <a class="btn btn-primary" style="margin-right: 10px" href="{{$posts->id}}/edit">Edit</a>
                <a class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')" href="/posts/{{$posts->id}}/delete">Delete</a>
            </div>
        </div>
    </div>
@endsection