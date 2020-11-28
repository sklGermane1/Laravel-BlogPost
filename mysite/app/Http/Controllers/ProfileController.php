<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index(User $user)
    {
        if (auth()->user() == $user) {
            return view("profile_page", [
                "user" => $user
            ]);
        } else {
            return redirect()->route("home");
        }
    }
    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            "username" => "required|max:255|min:3",
            "email" => "required|email|max:255|min:3",
            "bio" => "max:255",
            "website" => "max:255",
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $update_profile = User::find($user->id);
        if ($request->hasFile("image")) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs("images", $filename, "public");

            $update_profile->image = $filename;
        } else {
            $file = "default.jpg";
            $update_profile->image = $file;
        }
        $update_profile->username = $request->username;
        $update_profile->email = $request->email;
        $update_profile->bio = $request->bio;
        $update_profile->website = $request->website;


        $update_profile->save();
        return redirect()->route("home");
    }
}
