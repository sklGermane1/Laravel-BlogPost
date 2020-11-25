<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class EditController extends Controller

{
    public function index(Post $post)
    {
        return view("posts.posts_form", [
            "create" => false,
            "edit" => true,
            "label" => "Edit Post",
            "post" => $post
        ]);
    }
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            "title" => "required|min:3|max:255",
            "content" => "required|min:3|max:255"
        ]);
        $updated_post = Post::find($post->id);
        $updated_post->title = $request->title;
        $updated_post->content = $request->content;
        $updated_post->save();
        return redirect()->route("home");
    }
}
