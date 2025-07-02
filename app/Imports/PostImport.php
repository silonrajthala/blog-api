<?php

namespace App\Imports;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class PostImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['title'])) {
                continue;
            }

            $author = User::firstOrCreate(
                ['name' => $row['author']], 
                [
                    'email' => Str::slug($row['author']) . '@example.com',
                    'password' => bcrypt('password')
                ]
            );

            $category = Category::firstOrCreate(
                ['name' => $row['category']], 
                ['slug' => Str::slug($row['category'])]
            );

            Post::create([
                'title'       => $row['title'],
                'body'        => $row['body'],
                'author_id'   => $author->id,
                'category_id' => $category->id,
            ]);
        }
    }
}