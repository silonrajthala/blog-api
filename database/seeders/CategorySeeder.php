<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Laravel', 'React', 'Vue', 'DevOps'];

        foreach ($categories as $name) {
            \App\Models\Category::firstOrCreate([
                'name' => $name,
                'slug' => \Str::slug($name),
            ]);
        }
    }
}

