@extends('layouts.app')

@section('title', 'update user')

@section('content')

<h1 class="m-4"> update user:</h1>

<form action="{{route("users.update", $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group m-4">
        <label for="name">user name:</label>
        <input type="text" class="form-control mb-2" name="name" id="name" value="{{$user->name}}">
    </div>
    <div class="form-group m-4">
        <label for="email">user email:</label>
        <input type="email" class="form-control mb-2" name="email" id="email" value="{{$user->email}}">
    </div>
    <div class="form-group m-4">
        <p class="text-secondary">if you don't want to change the password leave this empty!</p>
        <label for="password">Enter Your New Password:</label>
        <input type="password" class="form-control mb-2" name="password" id="password">
        <p  class="text-secondary">must be at least 8 characters</p>

    </div>
    <div class="form-group m-4">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control mb-2" name="password_confirmation" id="confirm_password">
    </div>
    <div class="form-group m-4">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_admin" value="user" id="user" checked=<?php ($user->is_admin) ? 'checked' : ''?> >
            <label class="form-check-label" for="user">
                user
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_admin" value="admin" id="admin" checked=<?php ($user->is_admin) ? 'checked' : ''?> >
            <label class="form-check-label" for="admin">
                admin
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary m-4">Submit</button>
</form>

@endsection