<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// POST 
// AUTH
Route::get("/auth/register", [RegisterController::class, "index"])->name("register");
Route::get("/auth/login", [LoginController::class, "index"])->name("login");
// COMMON
Route::get('/', function () {
    return view('home');
})->name("home");

Route::get("/about", function () {
    return view("common.about");
})->name("about");
