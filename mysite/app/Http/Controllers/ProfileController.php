<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index(User $user)
    {
        return view("profile_page", [
            "user" => $user
        ]);
    }
    public function store(Request $request, User $user)
    {

        $this->validate($request, [
            "username" => "required|max:255|min:3",
            "email" => "required|email|max:255|min:3",
            "bio" => "max:255",
            "website" => "max:255"
        ]);
        $update_profile = User::find($user->id);
        $update_profile->username = $request->username;
        $update_profile->email = $request->email;
        $update_profile->bio = $request->bio;
        $update_profile->website = $request->website;
        $update_profile->save();
        return redirect()->route("home");
    }
}
