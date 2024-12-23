@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="d-flex justify-content-start">
    <div class="d-flex justify-content-start">
        <a href="{{route('users.create')}}" class="btn btn-secondary m-3 ">add new user</a>
    </div>
    <div class="d-flex justify-content-start">
        <a href="{{route('posts.index')}}" class="btn btn-secondary m-3 ">show posts</a>
    </div>
</div>

@forelse($users as $user)

    <div class="card m-2 " style="width: 18rem;">
        <div class="card-body">
                <h5 class="card-title d-inline"><a class="link-offset-2 link-underline link-underline-opacity-0 text-dark"
                        href="{{ route('users.show', $user->id)}}">{{$user->name}}</h5>
                <p class="d-inline"> ( {{ $admin = $user->is_admin ? 'admin' : 'user' }} )</p>

            <p class="card-text">{{$user->email}}</p>
            <div class="d-flex justify-content-start">
                <a href="{{route('users.edit', $user)}}" class="btn btn-primary m-1">Update</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-1">Delete</button>
                </form>

            </div>
        </div>
    </div>


@empty
    <p>An error occurred while fetching users.</p>
@endforelse

@endsection