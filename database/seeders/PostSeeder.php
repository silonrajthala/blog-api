<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::where('email', 'editor@example.com')->first();
        $category = Category::first();

        Post::create([
            'title' => 'Welcome to Laravel Blog',
            'body' => 'This is the first post in the system.',
            'author_id' => $author->id,
            'category_id' => $category->id,
        ]);
    }
}

