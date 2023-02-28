<?php

namespace App\Presenters;

use App\Models\Like;
use App\ResourceModels\LikeResource;

class LikePresenter
{
    public function present(Like $like): LikeResource
    {
        $resource = new LikeResource();

        $resource->id = $like->id;
        $resource->postId = $like->post_id;
        $resource->likerId = $like->liker_id;
        $resource->createdAt = $like->created_at;

        return $resource;
    }
}
