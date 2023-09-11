<?php

namespace App\DTOs;

use App\Enums\BlogPostSource;
use App\Http\Requests\Api\StoreBlogPostAppRequest as ApiStoreBlogPostAppRequest;
use App\Http\Requests\StoreBlogPostAppRequest;

class BlogPostDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $body,
        public readonly BlogPostSource $source
    ){}

    public static function fromAppRequest(StoreBlogPostAppRequest $request)
    {
        return new self(
            title: $request->validated('title'),
            body: $request->validated('body'),
            source: BlogPostSource::App
        );
    }
    public static function fromApiRequest(ApiStoreBlogPostAppRequest $request)
    {
        return new self(
            title: $request->validated('payload.data.title'),
            body: $request->validated('payload.data.body'),
            source: BlogPostSource::Api
        );
    }
}
