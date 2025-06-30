<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PublicPostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category'])->latest()->get();

        return PostResource::collection($posts);
    }
}

