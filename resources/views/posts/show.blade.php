@extends('layouts.app')

@section('title', 'show post')

@section('content')
<h1 class="m-5">{{$post->title}}</h1>
<div class="d-flex justify-content-start">
    
    <div class="m-5">
        <p class="text-center lead">
            {{ $post->description }}
        </p>
        <div class="d-flex justify-content-center m-4 ">
            <a href="{{route('posts.edit', $post)}}" class="btn btn-primary m-1">Update</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1">Delete</button>
            </form>
        </div>
        <div class="d-flex justify-content-center ">
            <a class="link-secondary" href="{{route('posts.index')}}">wanna go back?</a>
        </div>
    </div>
    <div class="m-5">
    <img class="rounded mx-auto d-block" src=" /images/posts/{{$post->image}}" alt="no image to show">
    </div>
</div>



@endsection