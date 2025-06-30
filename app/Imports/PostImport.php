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
            $author = User::firstOrCreate(
                ['email' => $row['author_email']],
                ['name' => $row['author_email'], 'password' => bcrypt('password')]
            );

            $category = Category::firstOrCreate(
                ['name' => $row['category_name']],
                ['slug' => Str::slug($row['category_name'])]
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

