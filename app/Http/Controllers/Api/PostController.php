<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Exports\PostExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

use App\Imports\PostImport;


class PostController extends Controller
{
    public function index()
    {
        return Post::with(['author', 'category'])->get();
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create([
            ...$request->validated(),
            'author_id' => auth()->id(),
        ]);
    
        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return $post->load(['author', 'category']);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        if (auth()->id() !== $post->author_id && !auth()->user()->hasRole('admin')) {
            abort(403);
        }
    
        $post->update($request->validated());
    
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        if (! auth()->user()->can('post-delete') || auth()->id() !== $post->author_id && !auth()->user()->hasRole('admin')) {
            abort(403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted']);
    }
    public function export()
    {
        if (!auth()->user()->hasAnyPermission(['post-create', 'post-edit', 'post-delete'])) {
            abort(403);
        }

        return Excel::download(new PostExport, 'posts.xlsx');
    }

    public function import(Request $request)
    {
        if (!auth()->user()->can('post-create')) {
            abort(403);
        }

        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new PostImport, $request->file('file'));

        return response()->json(['message' => 'Posts imported successfully']);
    }

}

