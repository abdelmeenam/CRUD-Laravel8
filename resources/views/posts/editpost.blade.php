@extends('app')

@section('title')
add
@endsection

@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
    {{Session::get('msg')}}
</div>
@endif

@section('operation')
Edit Post
@endsection

@section('content')
<form action="{{route('posts.update'  ,$post->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleInputEmail1">title </label>
        <input type="text" class="form-control" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">body</label>
        <textarea class="form-control" name="body" rows="3">{{$post->body}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection