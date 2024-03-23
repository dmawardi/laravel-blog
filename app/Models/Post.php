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

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) { // Allows you to replace default filter by using scope prefix
        // If a search term is provided, add it to the query
        $query->when($filters['search'] ?? false, function($query, $search) {
            // Search database for posts with the given search term
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            // Search database for posts with a category
            $query->whereHas('category', function($query) use ($category) {
                // Where the slug matches the category
                $query->where('slug', $category);
            });
        });
    }

    public function category()
    {
        // This is for the relationship between the post and category
        // Choices are: belongsTo, hasOne, hasMany, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        // This is for the relationship between the post and user. 
        // We want it to be labelled as author so we override the default user_id
        return $this->belongsTo(User::class, 'user_id');
    }

    // This is for the route to fetch the post by slug
    public function getRouteKeyName()
    {
        return 'slug'; // This is the field that Laravel will use to fetch the post (replaces id)
    }
}
