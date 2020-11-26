<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class CreatePostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        return view("posts.posts_form", [
            "create" => true,
            "edit" => false,
            "label" => "Add Post"

        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required|max:255|min:3",
            "content" => "required|max:500|min:3"
        ]);

        $request->user()->posts()->create([
            "title" => $request->title,
            "content" => $request->content
        ]);
        return redirect()->route("home");
    }
}
