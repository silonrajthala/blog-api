<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PostExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    public function query()
    {
        return Post::with(['author', 'category'])->select('id', 'title', 'body', 'category_id', 'author_id', 'created_at');
    }

    public function map($post): array
    {
        return [
            $post->title,
            $post->body,
            $post->author->name,
            $post->category->name,
            $post->created_at->toDateTimeString(),
        ];
    }

    public function headings(): array
    {
        return ['Title', 'Body', 'Author', 'Category', 'Created At'];
    }
}

