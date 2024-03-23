<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    //
    public function index() {
     // Build a query to fetch all posts
    //  filter is a scope method that adds the search term to the query
     $posts = Post::latest('published_at')->with('category', 'author')->filter(request(['search', 'category']))->get();
 
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
}
