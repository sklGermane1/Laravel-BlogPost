<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view("auth.register");
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "username" => "required|min:3|max:255",
            "email" => "required|email|min:4|max:255",
            "password" => "required|min:6|max:255|confirmed",
            "password_confirmation" => "required|min:6",
        ]);
        $file = "default.jpg";
        User::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "image" => $file
        ]);
        $request->session()->flash("message", "You are now Registered!");

        return redirect()->route("login");
    }
}
