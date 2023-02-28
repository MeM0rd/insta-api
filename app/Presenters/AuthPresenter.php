<?php

namespace App\Presenters;

use App\ResourceModels\AuthUserResource;
use App\Models\User;

class AuthPresenter
{
    public function present(User $user): ?AuthUserResource
    {
        $resource = new AuthUserResource();

        $resource->id = $user->id;
        $resource->email = $user->email;
        $resource->name = $user->name;
        $resource->isPublic = $user->is_public ? $user->is_public : true;
        $resource->createdAt = $user->created_at;

        return $resource;
    }
}
