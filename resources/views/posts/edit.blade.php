@extends('layouts.app')

@section('title', 'update post')

@section('content')

<h1 class="m-4"> update post:</h1>

<form action="{{route("posts.update", $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group m-4">
        <label for="title">post title:</label>
        <input type="text" class="form-control mb-2" name="title" id="title" value="{{$post->title}}">
    </div>
    <div class="form-group m-4">
        <label for="description">post description:</label>
        <textarea name="description" class="form-control mb-2">{{$post->description}}</textarea>
    </div>
    <div class="form-group m-4">
        <input type="file" class="form-control-file mb-2" name="images[]" multiple>
        <p>to select more than one file : hold ctrl then select</p>
    </div>
    <div class="form-group m-4">
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

        <button type="submit" class="btn btn-primary m-4">Submit</button>
</form>

@endsection