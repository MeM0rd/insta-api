<?php

namespace App\Http\Actions;

use App\Models\Like;

class LikeAction
{
    public function execute(int $postId, int $likerId): Like
    {
        $like = new Like();

        $like->post_id = $postId;
        $like->liker_id = $likerId;

        $like->save();

        return $like;
    }
}
