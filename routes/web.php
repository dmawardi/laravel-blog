<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('posts/{slug}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(! file_exists($path)) {
        // dd is used to pass messages for debugging
        // dd('File does not exist.');

        // abort is used to return a status code and a message
        // abort(404);

        return redirect('/');
    }

    // Set a cache with a key (post.{%slug}) for 30 minutes, if cache value doesn't exist, run the function
    // Old function (Now replaced with arrow function)
    // function() use ($path) {
    //     var_dump('file_get_contents');
    //     return file_get_contents($path);
    // }
    $post = cache()->remember("post.{$slug}", now()->addMinutes(20), fn()=> file_get_contents($path));

    // Non cache version
    // $post = file_get_contents($path);
    
    return view('post', ['post' => $post]);
// slug validation (failure results in 404)
// For just alphanumeric characters
// ->whereAlpha('slug')
// The above can be replaced with built in
})->where('slug', '[A-z_\-]+');
