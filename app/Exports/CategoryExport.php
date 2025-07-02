<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CategoryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Category::select('name', 'slug')->get();
    }
    public function headings(): array
    {
        return ['name', 'slug'];
    }
}

