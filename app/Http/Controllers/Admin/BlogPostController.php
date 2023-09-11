<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Enums\BlogPostSource;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Blog\BlogPostService;
use App\Http\Requests\StoreBlogPostAppRequest;
use App\Http\Resources\Admin\BlogPostResource;

class BlogPostController extends Controller
{
    public function __construct(protected BlogPostService $service){}

    public function store(StoreBlogPostAppRequest $request): BlogPostResource
    {
        $post = $this->service->store(
            $request->validated('title'),
            $request->validated('body'),
            BlogPostSource::App
        );

        return BlogPostResource::make(
            $post
        );
    }

    public function update(StoreBlogPostAppRequest $request, BlogPost $blogPost): BlogPostResource
    {
        $post = $this->service->update(
            $blogPost,
            $request->validated('title'),
            $request->validated('body'),
        );

        return BlogPostResource::make(
            $post
        );
    }
}
