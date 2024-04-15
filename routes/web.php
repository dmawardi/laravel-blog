<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;

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

Route::get('/', [PostController::class, 'index'])->name('home');

// Using the Post model to fetch a post tells Laravel to look for a post with the given id
// Using post:slug is no longer required as the Post model has a getRouteKeyName method that returns the field to use for fetching the post
// Convention is to set the slug field as the search field below in the route as opposed to getRouteKeyName
Route::get('posts/{post:slug}', [PostController::class, 'show'])->where('slug', '[A-z_\-]+');

Route::get('register', [RegistrationController::class, 'create'])->middleware('guest');
Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy']);
