<?php

namespace App\ResourceModels;

use Illuminate\Support\Carbon;

class PostResource
{
    public int $id;

    public int $userId;

    public string $userName;

    public string $text;

    public bool $isPublic;

    public Carbon $createdAt;
}
