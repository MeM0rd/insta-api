<?php

namespace App\ResourceModels;

use Illuminate\Support\Carbon;

class LikeResource
{
    public int $id;

    public int $postId;

    public int $likerId;

    public Carbon $createdAt;
}
