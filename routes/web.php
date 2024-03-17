<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
    // Build a query to fetch all posts
    $posts = Post::latest('published_at')->with('category', 'author');
    // If a search term is provided, add it to the query
    addSearchTerm($posts);
    // Fetch all posts
    $posts = $posts->get();

    // with method is used to eager load the category relationship. This is used to prevent n+1 queries
    // $posts = Post::all();
    // Get is used to execute the query after with adds foreign key and latest sorts by published_at
    return view('posts', [
        'posts' => $posts,
        'categories' => Category::all(),
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
        // load allows you to remove the n+1 problem by eager loading the category and author relationships
        // This is different when loading from the model with the foreign key, which uses with
        'posts' => $category->posts,
        'categories' => Category::all(),
    ]);
});

// Route to fetch posts by author
Route::get('authors/{author:username}', function (User $author) {
    // ->load(['category', 'author']) is used to eager load the category and author relationships
    // Alternatively, you can add a protected field in the model to automatically load the relationships
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
    ]);
});

// function to add search term to posts query
function addSearchTerm($postsQuery) {
    if(request('search'))  {
        $searchTerm = request('search');
        // Search database for posts with the given search term
        $postsQuery->where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('body', 'like', '%' . $searchTerm . '%');
    }
    // Fetch all posts
    return $postsQuery;
}