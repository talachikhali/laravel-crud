<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use App\Models\User;

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
        $images = [];
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
                $image->move(public_path('/images/posts'), $imageName);
                array_push($images, $imageName);
            }
        }
        post::create(attributes: [
            "title" => $request->title,
            "description" => $request->description,
            "image" => json_encode($images)
        ]);
        return redirect()->route("posts.index");

    }
    function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    function update(Request $request, Post $post)
    {
        $images = [];
        if ($request->hasFile('images')) {
            foreach(json_decode($post->image,true) as $key => $image){
                $image_path = public_path('/images/posts/' . $image);
                    if(File::exists($image_path)){
                        File::delete($image_path);
                    }
            }
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName() . "-" . time() . ".". $image->getClientOriginalExtension();
                $image->move(public_path('/images/posts'), $imageName);
                array_push($images, $imageName);
            }
        }else {
            foreach(json_decode($post->image) as $key => $image){          
            $images [] = $image;
            }
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => json_encode($images)
        ]);

        return redirect()->route('posts.index');
    }
    function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }  
    function destroy(Post $post)
    {
        Gate::authorize('manageUser',User::class);
        foreach(json_decode($post->image,true) as $key => $image){
            $image_path = public_path('/images/posts/' . $image);
                if(File::exists($image_path)){
                    File::delete($image_path);
                }
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
