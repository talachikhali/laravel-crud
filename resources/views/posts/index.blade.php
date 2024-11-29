@extends('layouts.app')

@section('title', 'posts')

@section('content')

<div class="d-flex justify-content-center">
<a href="{{route('posts.create')}}" class="btn btn-secondary m-3 ">add new post</a>
</div>

@forelse($posts as $post)
    <div class="container">
        <div class="row border border-secondary rounded-start">
            <div class="m-3 col-3" style="width: 18rem;">

                <div class="m-2">
                    <h5 class="text-center"><a class="link-offset-2 link-underline link-underline-opacity-0 text-dark"
                            href="{{ route('posts.show', $post->id)}}">{{ $post->title }}</a></h5>
                    <p class="text-center">{{$post->description}}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('posts.edit', $post)}}" class="btn btn-primary m-1">Update</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-1">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @if($post->image != "[]")
                <div class="container col-9">
                    <div class="row m-2">
                        @foreach(json_decode($post->image) as $key => $image)
                            <div class="col-md-4">
                                <img src=" /images/posts/{{$image}}" class="img-fluid" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="col-9 d-flex justify-content-center align-items-center">
                    <h6>no images to this post</h6>
                </div>
            @endif
        </div>
        <br>
    </div>
@empty
<div class="d-flex justify-content-center">
    <h1 >there is no posts</h1>
    </div>
@endforelse

@endsection
