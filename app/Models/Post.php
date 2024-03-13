<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // Protected fields disallow mass assignments to certain fields but allow for mass assignment for excl. fields
    protected $guarded = ['id'];
    // Fillable allows for fields to be mass assigned
    // E.g. $post = Post::create('title' => 'New Post', 'excerpt' => 'New Excerpt', 'body' => 'New Body');
    // protected $fillable = ['title', 'excerpt', 'body'];

    public function category()
    {
        // This is for the relationship between the post and category
        // Choices are: belongsTo, hasOne, hasMany, belongsToMany
        return $this->belongsTo(Category::class);
    }

    // This is for the route to fetch the post by slug
    public function getRouteKeyName()
    {
        return 'slug'; // This is the field that Laravel will use to fetch the post (replaces id)
    }
}
