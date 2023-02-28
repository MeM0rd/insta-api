<?php

namespace App\Http\Queries;

use App\Models\Post;
use Illuminate\Support\Collection;

class PostQueries
{
    public function getPublicPosts(): Collection
    {
        return Post::whereIsPublic(true)->withCount('likes')->orderByDesc('created_at')->get();
    }

    public function getPosts(): Collection
    {
        return Post::withCount('likes')->orderByDesc('created_at')->get();
    }
}
