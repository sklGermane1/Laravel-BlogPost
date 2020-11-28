<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index(User $user)
    {
        $posts = $user->posts()->with(["user", "likes"])->paginate(20);
        return view("posts.posts", [
            "user" => $user,
            "posts" => $posts
        ]);
    }
}
