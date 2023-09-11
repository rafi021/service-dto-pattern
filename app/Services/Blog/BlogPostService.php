<?php

namespace App\Services\Blog;

use App\Models\BlogPost;
use App\Enums\BlogPostSource;

class BlogPostService
{
    public function store(string $title, string $body, BlogPostSource $blogPostSource)
    {
       return BlogPost::create([
            'title' => $title,
            'body' => $body,
            'source' => $blogPostSource,
        ]);
    }

    public function update(BlogPost $blogPost, string $title, string $body)
    {
       return tap($blogPost)->update([
            'title' => $title,
            'body' => $body
        ]);
    }
}
