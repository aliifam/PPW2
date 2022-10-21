@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Edit Blog Post</h1>
            <form action="{{route('posts.update', $posts->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title', $posts->title)}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control" rows="5">{{old('description', $posts->description)}}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                @if(count($errors))
                    <div class="form-group" style="margin-top: 20px">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul style="margin-bottom: 0px">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div> 
@endsection