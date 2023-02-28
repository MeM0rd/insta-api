<?php

namespace App\Presenters;

use App\Models\Post;
use App\ResourceModels\PostResource;

class PostCreatePresenter
{
    public function present(Post $post): PostResource
    {
        $resource = new PostResource();

        $resource->id = $post->id;
        $resource->userId = $post->user_id;
        $resource->userName = $post->user_name;
        $resource->text = $post->text;
        $resource->isPublic = $post->is_public;
        $resource->createdAt = $post->created_at;

        return $resource;
    }
}
