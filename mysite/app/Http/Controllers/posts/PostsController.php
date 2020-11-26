<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $posts = Post::latest()->with("user")->paginate(5);
        return view("home", [
            "posts" => $posts
        ]);
    }
    public function delete(Post $post)
    {
        $this->authorize("authorized", $post);
        $post->delete();
        return redirect()->route("home");
    }
}
