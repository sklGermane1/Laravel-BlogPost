<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view("auth.login");
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "username" => "required|min:3|max:255",
            "password" => "required|min:6|max:255"
        ]);
        if (!auth()->attempt($request->only("username", "password"))) {
            return back()->with("status", "Invalid Credentials");
        }
        $request->session()->flash("message", "Your are now logged in.");
        return redirect()->route("home");
    }
}
