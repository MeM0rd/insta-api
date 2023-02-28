<?php

namespace App\Http\Controllers;

use App\Presenters\AuthPresenter;
use App\Http\Actions\RegisterAction;
use App\Factories\RegisterFactory;
use App\Http\Requests\RegisterRequest;
use App\Http\Actions\LoginAction;
use App\Http\Requests\LoginRequest;
use App\Traits\JsonResponsible;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use JsonResponsible;

    protected AuthPresenter $authPresenter;

    public function __construct(AuthPresenter $authPresenter)
    {
        $this->authPresenter = $authPresenter;
    }

    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $action = $action->execute($email, $password);

        $result = $this->authPresenter->present($action);

        return $this->success($result);
    }

    public function register(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        $dto = RegisterFactory::fromRequest($request);

        $action = $action->execute($dto);

        $result = $this->authPresenter->present($action);

        return $this->success($result);
    }
}
