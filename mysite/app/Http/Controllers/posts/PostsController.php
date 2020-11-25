<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::get();
        return view("home", [
            "posts" => $posts
        ]);
    }
}
