@extends('app')

@section('title')
add
@endsection

@section('operation')
Add Post
<hr>
<a href="{{route('posts.index')}}" class="btn btn-info">All Posts</a>
@endsection

@section('content')
<form action="{{route('posts.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">title </label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">body</label>
        <textarea class="form-control" name="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection