<?php

namespace App\Factories;

use App\Http\DTOs\PostCreateDTO;
use App\Http\Requests\PostCreateRequest;

class PostCreateFactory
{
    public static function fromRequest(PostCreateRequest $request): PostCreateDTO
    {
        $dto = new PostCreateDTO();

        $dto->userId = $request->get('user_id');
        $dto->userName = $request->get('user_nickname');
        $dto->text = $request->get('text');
        $dto->isPublic = $request->get('is_public');

        return $dto;
    }
}
