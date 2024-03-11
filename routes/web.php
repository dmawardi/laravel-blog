<?php

use App\Models\Post;
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

Route::get('posts/{slug}', function ($slug) {
    try {
        // Fetch post using Post model
        $post = Post::findOrFail($slug);

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
