<?php

use App\Models\post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->userCoolposts()->latest()->get();
    }
    return view('home',['posts'=> $posts]);
});

Route::post('/register', [UserController::class, 'register']); 
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Blog post related routes
route::post('/create-post', [PostController::class, 'createPost']);
route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);