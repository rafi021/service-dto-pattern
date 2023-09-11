<?php

namespace App\Services\Blog;

use App\DTOs\BlogPostDTO;
use App\Models\BlogPost;
use App\Enums\BlogPostSource;

class BlogPostService
{
    public function store(BlogPostDTO $blogPostDTO)
    {
       return BlogPost::create([
            'title' => $blogPostDTO->title,
            'body' => $blogPostDTO->body,
            'source' => $blogPostDTO->source,
        ]);
    }

    public function update(BlogPost $blogPost, BlogPostDTO $blogPostDTO)
    {
       return tap($blogPost)->update([
            'title' => $blogPostDTO->title,
            'body' => $blogPostDTO->body,
            'source' => $blogPostDTO->source,
        ]);
    }
}
