<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\posts\PostsController;
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

Route::post("/auth/register", [RegisterController::class, "store"]);
Route::post("/auth/login", [LoginController::class, "store"]);
Route::post("/auth/logout", [LogoutController::class, "store"])->name("logout");
// COMMON
Route::get("/", [PostsController::class, "index"])->name("home");

Route::get("/about", function () {
    return view("common.about");
})->name("about");
