<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post) {
        request()->validate([
            'body'=> ['required']
        ]);
        // Will create a comment for the associated post
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body'),
        ]);
        return back();
    }
}
