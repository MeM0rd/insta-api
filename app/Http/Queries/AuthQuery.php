<?php

namespace App\Http\Queries;

use App\Models\User;

class AuthQuery
{
    public function findUserByEmail(string $email): ?User
    {
        return User::whereEmail($email)->first();
    }

    public function existByEmail(string $email): bool
    {
        return User::where('email', 'ilike', $email)->exists();
    }
}
