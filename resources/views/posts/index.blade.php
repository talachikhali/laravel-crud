@extends('layouts.app')

@section('title', 'posts')

@section('content')

<a href="{{route('posts.create')}}" class="btn btn-secondary m-3">add new post</a>

@forelse($posts as $post)
    <div class="card m-3" style="width: 18rem;">
        <img class="card-img-top" src=" /images/posts/{{$post->image}}" alt="no image to this post">
        <div class="card-body">
            <h5 class="card-title"><a class="link-offset-2 link-underline link-underline-opacity-0 text-dark"
                    href="{{ route('posts.show', $post->id)}}">{{ $post->title }}</a></h5>
            <p class="card-text">{{$post->description}}</p>
            <div class="d-flex justify-content-start">
                <a href="{{route('posts.edit', $post)}}" class="btn btn-primary m-1">Update</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-1">Delete</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <h1>there is no posts</h1>
@endforelse
@endsection