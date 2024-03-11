<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    // Properties
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;
    
    // Constructor
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    // Methods
    public static function find($slug)
    {
        // Build path to resource folder then to the post
        $path = resource_path("posts/{$slug}.html");

        // If the file does not exist, return to the home page
        if (! file_exists($path)) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", now()->addMinutes(20), fn() => file_get_contents($path));
   
    }

    public static function all()
    {
        $files = File::files(resource_path("posts/"));


        // Iterate through files array and parse each file as new post
        $posts = array_map(function ($file) {
            $document = YamlFrontMatter::parseFile($file);

            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                // Uses function as requires getter to set
                $document->body(),
                $document->slug,
            );

        }, $files);

        // Old iteration method
        // $posts = [];
        // foreach ($files as $file) {
        //     // Push the parsed file into the documents array
        //     $document = YamlFrontMatter::parseFile($file);

        //     // Push a new post object into the posts array
        //     $posts[] = new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         // Uses function as requires getter to set
        //         $document->body(),
        //         $document->slug,
        //     );
        // }

        // Array map loops through arrays. In this case, each file and returns the contents of each file
        // $fileContents = array_map(fn($file) => $file->getContents(), $files);
        // return $fileContents;
        return $posts;
    }
}
?>