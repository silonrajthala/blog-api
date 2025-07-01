<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;


use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('category-manage');
        return Category::all();
    }

    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = \Str::slug($data['name']);
    
        $category = Category::create($data);
    
        return response()->json($category, 201);
    }

    public function destroy(Category $category)
    {
        $this->authorize('category-manage');

        if ($category->posts()->exists()) {
            return response()->json(['error' => 'Category has posts and cannot be deleted.'], 400);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted']);
    }

    public function export()
    {
        $this->authorize('category-manage');
        return Excel::download(new CategoryExport, 'categories.xlsx');
    }

    public function import(Request $request)
    {
        $this->authorize('category-manage');

        $request->validate(['file' => 'required|mimes:xlsx,xls']);

        Excel::import(new CategoryImport, $request->file('file'));

        return response()->json(['message' => 'Categories imported successfully']);
    }

}

