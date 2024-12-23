<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/posts', [PostController::class, "index"])->name('posts.index');

// Route::get('/posts/create', [PostController::class, "create"])->name('posts.create');

// Route::post("/", [PostController::class, 'store'])->name('posts.store');

// Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::middleware(("guest"))->group(function () {

    Route::get("/", [AuthController::class, "showLoginForm"])->name('login');

    Route::post("/", [AuthController::class, "login"]);
});

Route::middleware("auth")->group(function () {
    Route::resource('posts', PostController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('users', UserController::class);

});
