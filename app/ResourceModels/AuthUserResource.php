<?php

namespace App\ResourceModels;

use Illuminate\Support\Carbon;

class AuthUserResource
{
    public int $id;

    public string $email;

    public string $name;

    public bool $isPublic;

    public Carbon $createdAt;
}
