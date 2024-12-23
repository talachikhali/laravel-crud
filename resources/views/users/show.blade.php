@extends('layouts.app')

@section('title', 'show user')

@section('content')
<h1 class="m-5">{{$user->title}}</h1>
<div class="d-flex justify-content-start">

    <div class="m-5">
        <p class="text-center lead">
            {{ $user->name }}
        </p>
        <div class="d-flex justify-content-center m-4 ">
            <a href="{{route('users.edit', $user)}}" class="btn btn-primary m-1">Update</a>
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
        @if($post->image)
            <div class="container">
                <div class="row">
                    @foreach(json_decode($post->image) as $key => $image)
                        <div class="col-md-4">
                            <img src=" /images/posts/{{$image}}" class="img-fluid" alt="">
                        </div>
                    @endforeach
                </div>
        @endif
        </div>
    </div>
</div>



@endsection