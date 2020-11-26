<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\posts\PostsController;
use App\Http\Controllers\posts\CreatePostController;
use App\Http\Controllers\posts\EditController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostLikeController;
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
Route::get("/posts/create", [CreatePostController::class, "index"])->name("create-post");
Route::post("/posts/create", [CreatePostController::class, "store"]);
Route::delete("/posts/{post}/delete", [PostsController::class, "delete"])->name("delete-post");
Route::get("/posts/{post}/edit", [EditController::class, "index"])->name("edit-post");
Route::post("/posts/{post}/edit", [EditController::class, "store"]);
// PROFIL PAGE
Route::get("/{user}/profile", [ProfileController::class, "index"])->name("profile");
Route::post("/{user}/profile", [ProfileController::class, "store"]);
// LIKE && DISLIKE
Route::post("/posts/{post}/like", [PostLikeController::class, "store"])->name("like");
Route::delete("/posts/{post}/dislike", [PostLikeController::class, "destroy"]);
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
