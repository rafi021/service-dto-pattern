<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Enums\BlogPostSource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreBlogPostAppRequest as ApiStoreBlogPostAppRequest;
use App\Http\Resources\Api\BlogPostResource;
use App\Services\Blog\BlogPostService;
use Illuminate\Http\JsonResponse;

class BlogPostController extends Controller
{

    public function __construct(protected BlogPostService $service){}

    public function store(ApiStoreBlogPostAppRequest $request): BlogPostResource
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
}
