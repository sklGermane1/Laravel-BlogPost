<?php

namespace App\Http\Controllers\reset_password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\reset_password;

class reset_password_emailController extends Controller
{
    public function index()
    {
        return view("reset_password.reset_email");
    }
    private function sendResetEmail($token, $email)
    {
        Mail::to("billcrafter007@gmail.com")->send(new reset_password($token, $email));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "email" => "required|min:3|max:255|email"
        ]);
        $user = DB::table("users")->where("email", $request->email)->first();
        if (!$user) {
            return redirect()->route("login");
        }
        DB::table("password_resets")->insert([
            "email" => $request->email,
            "token" => Str::random(60),
            "created_at" => Carbon::now()
        ]);

        $token = DB::table("password_resets")->where("email", $request->email)->first();

        if ($this->sendResetEmail($request->email, $token->token)) {
            return redirect()->back()->with("status", trans("A reset link has been sent to your email adresse."));
        } else {
            return redirect()->back()->withErrors(["error" => trans("An Error occurred. Please try again later")]);
        }
    }
}
