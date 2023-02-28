<?php

namespace App\Http\Controllers;

use App\Factories\PostCreateFactory;
use App\Http\Actions\PostCreateAction;
use App\Http\Requests\PostCreateRequest;
use App\Presenters\PostCreatePresenter;
use App\Presenters\PostListPresenter;
use App\Traits\JsonResponsible;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    use JsonResponsible;

    public function index(PostListPresenter $presenter): JsonResponse
    {
        $result = $presenter->present();

        return $this->success($result);
    }

    public function create(PostCreateRequest $request, PostCreateAction $action, PostCreatePresenter $presenter): JsonResponse
    {
        $dto = PostCreateFactory::fromRequest($request);

        $action = $action->execute($dto);

        $result = $presenter->present($action);

        return $this->success($result);
    }
}
