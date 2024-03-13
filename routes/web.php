<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    $posts = Post::all();
    return view('posts', [
        'posts' => $posts
    ]);
});

// Using the Post model to fetch a post tells Laravel to look for a post with the given id
// Using post:slug is no longer required as the Post model has a getRouteKeyName method that returns the field to use for fetching the post
// Convention is to set the slug field as the search field below in the route as opposed to getRouteKeyName
Route::get('posts/{post:slug}', function (Post $post) { // Laravel will automatically fetch the post with the given slug when using post:slug
    try {
        // Fetch post using Post model
        // $post = Post::findOrFail($post);
    // Catch not found error and redirect if found
    } catch (ModelNotFoundException $e) {
        return redirect('/');
    }

    // Return view with post data
    return view('post', ['post' => $post]);

// slug validation (failure results in 404)
// For just alphanumeric characters
// ->whereAlpha('slug')
// The above can be replaced with built in
})->where('slug', '[A-z_\-]+');

// Route to fetch posts by category
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});