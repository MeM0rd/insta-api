<?php

namespace App\Http\Actions;

use App\Http\DTOs\PostCreateDTO;
use App\Models\Post;

class PostCreateAction
{
    public function execute(PostCreateDTO $dto): Post
    {
        $post = new Post();

        $post->user_id = $dto->userId;
        $post->user_name = $dto->userName;
        $post->is_public = $dto->isPublic;
        $post->text = $dto->text;

        $post->save();

        return $post;
    }
}
