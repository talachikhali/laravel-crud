@extends('layouts.app')

@section('title', 'Add Users')

@section('content')
<h1 class="m-4"> Add Users:</h1>

<form action="{{route('users.store')}}" method="POst" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-4">
        <label for="name">Name:</label>
        <input type="text" class="form-control mb-2" placeholder="enter name" name="name" id="name">
    </div>
    <div class="form-group m-4">
        <label for="email">Email:</label>
        <input type="email" class="form-control mb-2" placeholder="enter email" name="email" id="email">
    </div>
    <div class="form-group m-4">
        <label for="password">password:</label>
        <input type="password" class="form-control mb-2" placeholder="enter password" name="password" id="password">
        <p>must be at least 8 characters</p>
    </div>
    <div class="form-group m-4">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control mb-2" name="password_confirmation" id="confirm_password">
    </div>

    <div class="form-group m-4">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_admin" value="user" id="user" checked>
            <label class="form-check-label" for="user">
                user
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_admin" value="admin" id="admin" >
            <label class="form-check-label" for="admin">
                admin
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mx-4">login</button>
</form>

@endsection