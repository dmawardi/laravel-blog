<?php

namespace Database\Seeders;

use \App\Models\User;
use \App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Clears tables
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        // Creates a user with the name John Doe (create param is an array of attributes to override defaults)
        $user = User::factory()->create([
            'name' => 'John Doe']);

        // Post will automatically create a user and category
        Post::factory(10)->create([
            'user_id' => $user->id
        ]);

        $category = Category::factory()->create();
        Post::factory(10)->create([
            'category_id' => $category->id
        ]);
        // $user = User::factory()->create();

        // // Create categories
        // $hobby = Category::create([
        //     'name' => 'Hobby',
        //     'slug' => 'hobby',
        // ]);

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal',
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work',
        // ]);

        // Post::Create([
        //     'title' => 'My First Post',
        //     'excerpt' => '<p>This is the first post</p>',
        //     'body' => '<p>This is the body of the first post</p>',
        //     'slug' => 'my-first-post',
        //     'category_id' => $work->id,
        //     'user_id' => $user->id,
        // ]);

        // Post::Create([
        //     'title' => 'My Second Post',
        //     'excerpt' => '<p>This is the second post</p>',
        //     'body' => '<p>This is the body of the second post</p>',
        //     'slug' => 'my-second-post',
        //     'category_id' => $hobby->id,
        //     'user_id' => $user->id,
        // ]);

        // Post::Create([
        //     'title' => 'My Third Post',
        //     'excerpt' => '<p>This is the third post</p>',
        //     'body' => '<p>This is the body of the third post</p>',
        //     'slug' => 'my-third-post',
        //     'category_id' => $personal->id,
        //     'user_id' => $user->id,
        // ]);
    }
}
