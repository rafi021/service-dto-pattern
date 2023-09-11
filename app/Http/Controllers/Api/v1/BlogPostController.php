<?php

namespace App\Http\Controllers\Api\v1;

use App\DTOs\BlogPostDTO;
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
        $post = $this->service->store(BlogPostDTO::fromApiRequest($request));
        return BlogPostResource::make($post);
    }

    public function update(ApiStoreBlogPostAppRequest $request, BlogPost $blogPost): BlogPostResource
    {
        $post = $this->service->update(
            $blogPost,
            new BlogPostDTO(
                title: $request->validated('payload.data.title'),
                body: $request->validated('payload.data.body'),
                source: BlogPostSource::Api
            )
        );

        return BlogPostResource::make(
            $post
        );
    }
}
