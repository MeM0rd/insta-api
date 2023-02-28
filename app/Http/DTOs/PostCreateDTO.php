<?php

namespace App\Http\DTOs;

class PostCreateDTO
{
    public int $userId;

    public string $userName;

    public string $text;

    public bool $isPublic;
}
