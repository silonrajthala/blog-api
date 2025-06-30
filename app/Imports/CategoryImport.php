<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class CategoryImport implements ToModel
{
    public function model(array $row)
    {
        return new Category([
            'name' => $row[0],
            'slug' => $row[1] ?? Str::slug($row[0]),
        ]);
    }
}

