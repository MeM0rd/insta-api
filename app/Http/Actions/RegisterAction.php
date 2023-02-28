<?php

namespace App\Http\Actions;

use App\Exceptions\AuthValidationException;
use App\Http\DTOs\RegisterDTO;
use App\Http\Queries\AuthQuery;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;

class RegisterAction
{
    protected AuthManager $authManager;

    protected Hasher $hasher;

    protected AuthQuery $authQuery;

    public function __construct(AuthManager $authManager, Hasher $hasher, AuthQuery $authQuery)
    {
        $this->authManager = $authManager;
        $this->hasher = $hasher;
        $this->authQuery = $authQuery;
    }


    public function execute(RegisterDTO $dto): User
    {
        if ($this->authQuery->existByEmail($dto->email)) {
            throw new AuthValidationException('Пользователь с таким Email уже существует', 422);
        }

        $user = new User;

        $user->email = $dto->email;
        $user->password = $this->hasher->make($dto->password);
        $user->name = $dto->name;

        $user->save();

        return $user;
    }
}
