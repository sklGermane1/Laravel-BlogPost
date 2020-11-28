<?php

namespace App\Http\Controllers\reset_password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class reset_passwordController extends Controller
{
    //
    public function index($token)
    {
        return view("reset_password.reset_password", [
            "token" => $token
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "password" => "required|min:6|max:255|confirmed",
            "password_confirmation" => "required|min:6|max:255"
        ]);
        $token = DB::table("password_resets")->where("token", $request->token)->first();
        if (!$token) return view("reset_password_email");
        $user = User::where("email", $token->email)->first();
        if (!$user) return redirect()->route("reset_password_email")->withErrors(["email" => "Email not found."]);

        $user->password = Hash::make($request->password);
        $user->update();
        DB::table("password_resets")->where("email", $user->email)->delete();
        return redirect()->route("login")->with("status", "Password has been changed!");
    }
}
