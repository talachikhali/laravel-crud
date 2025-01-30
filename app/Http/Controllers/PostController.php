<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    function create()
    {
        return view('posts.create');
    }
    function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName() . "-" . time() . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path('/images/posts'), $imageName);
        } else {
            $imageName = 'no image to display';
        }
        post::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $imageName
        ]);

        return redirect()->route("posts.index");

    }
    function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    function update(Request $request, Post $post)
    {

        if ($request->hasFile('image')) {

            $file_path = public_path('images/posts/' . $post->image);
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $imageName = $request->file('image')->getClientOriginalName() . "-" . time() . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path('/images/posts'), $imageName);
        } else {
            $imageName = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('posts.index');
    }
    function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    function destroy(Post $post)
    {
        $file_path = public_path('images/posts/' . $post->image);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
