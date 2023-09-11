<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BlogPostSource;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $post = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'source' => BlogPostSource::App,
        ]);

        return response()->json([
            'post' => $post
        ]);
    }
}
