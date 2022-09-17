@extends('layouts.base')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Add Blog Post</h1>
            <form action="{{route('posts.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> 
@endsection