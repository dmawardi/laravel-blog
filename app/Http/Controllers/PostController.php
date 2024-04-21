<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //
    public function index() {
     // Build a query to fetch all posts
    //  filter is a scope method that adds the search term to the query
     $posts = Post::latest('published_at')->with('category', 'author')->filter(
        // Grab query params from the request
        request(['search', 'category', 'author'])
        // Paginate and add current query string to the pagination links
        )->paginate(6)->withQueryString();
 
     // with method is used to eager load the category relationship. This is used to prevent n+1 queries
     // $posts = Post::all();
     // Get is used to execute the query after with adds foreign key and latest sorts by published_at
     return view('posts.index', [
         'posts' => $posts,
     ]);
    }

    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    public function create() {
        return view('posts.create', [
            'categories' => Category::all(),
        ]);
    }
    public function store() {
        // Validate the request
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => ['required','image'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);        
        // Add the author id to the attributes
        $attributes['author_id'] = auth()->id();

        // Store the image in the public directory: thumbnails
        $baseFilePath = request()->file('thumbnail')->store('thumbnails');
        // Update the thumbnail path in the attributes
        $attributes['thumbnail'] = 'storage/'.$baseFilePath;
        dd($attributes);
        // Create the post
        Post::create($attributes);
        // Redirect to the home page
        return redirect('/');
    }
}
