<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;

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

// Route to fetch posts by category
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        // load allows you to remove the n+1 problem by eager loading the category and author relationships
        // This is different when loading from the model with the foreign key, which uses with
        'posts' => $category->posts,
    ]);
});

// Route to fetch posts by author
Route::get('authors/{author:username}', function (User $author) {
    // ->load(['category', 'author']) is used to eager load the category and author relationships
    // Alternatively, you can add a protected field in the model to automatically load the relationships
    return view('posts', [
        'posts' => $author->posts,
    ]);
});