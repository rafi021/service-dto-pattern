<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Enums\BlogPostSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BlogPostController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $post = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'source' => BlogPostSource::Api,
        ]);

        return response()->json([
            'post' => $post
        ]);
    }
}
