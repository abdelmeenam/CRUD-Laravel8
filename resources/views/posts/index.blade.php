@extends('app')

@section('title')
All posts
@endsection

@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
    {{Session::get('msg')}}
</div>
@endif

@section('operation')
Your Posts!....ADD more?<a href="{{route('posts.create')}}" class="btn btn-primary">Add</a>
@endsection

@section('content')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
        <tr>
            <th scope="row">{{ $loop->iteration}}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>
                <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary">Update</a>
                <form action="{{route('posts.destroy' , $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mt-1 auto btn btn-danger ">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <td colspan="4" style="text-align: center;">No users</td>
        @endforelse
    </tbody>
</table>
@endsection