<?php

namespace App\Http\Actions;

use App\Exceptions\AuthValidationException;
use App\Http\Queries\AuthQuery;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Auth;

class LoginAction
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

    public function execute(string $email, string $password): ?Authenticatable
    {
        $user = $this->authQuery->findUserByEmail($email);

        if (!$user) {
            throw new AuthValidationException('Такого пользователя не существует', 322);
        }

        $validCredentials = $this->hasher->check($password, $user->password);

        if (!$validCredentials) {
            throw new AuthValidationException('Неверные данные пользователя');
        }

        $attempt = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        if (!$attempt) {
            throw new AuthValidationException('Что-то пошло не так');
        };

        return $this->authManager->guard()->user();
    }
}

