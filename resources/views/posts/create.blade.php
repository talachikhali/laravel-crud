@extends('layouts.app')

@section('title', 'add post')

@section('content')
<h1 class="m-4">add new post:</h1>

<form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-4">
        <label for="title">post title:</label>
        <input type="text" class="form-control mb-2" name="title" id="title" placeholder="write your post title">
    </div>
    <div class="form-group m-4">
        <label for="description">post description:</label>
        <textarea name="description" class="form-control mb-2" placeholder="write your post description"></textarea>
    </div>
    <div class="form-group m-4">
        <input type="file" class="form-control-file mb-2" name="image">
    </div>
    <button type="submit" class="btn btn-primary mx-4">Submit</button>
</form>

@endsection