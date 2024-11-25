@extends('layouts.app')

@section('title' , 'update post')

@section('content')

<h1 class="m-4"> update post:</h1>

<form action="{{route("posts.update" , $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group m-4">
        <label for="title">post title:</label>
        <input type="text" class="form-control mb-2" name="title" id="title" value="{{$post->title}}">
    </div>
    <div class="form-group m-4">
        <label for="description">post description:</label>
        <textarea name="description" class="form-control mb-2" >{{$post->description}}</textarea>
    </div>
    <div class="form-group m-4">
        <input type="file" class="form-control-file mb-2" name="image">
    </div>
    <div  class="form-group m-4">
    <img class="card-img-top" src=" /images/posts/{{$post->image}}" alt="">
    </div>

    <button type="submit" class="btn btn-primary m-4">Submit</button>
</form>

@endsection