<?php

namespace App\Http\Controllers;

use App\Http\Actions\LikeAction;
use App\Http\Requests\LikeRequest;
use App\Presenters\LikePresenter;
use App\Traits\JsonResponsible;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    use JsonResponsible;

    public function create(LikeRequest $request, LikeAction $action, LikePresenter $presenter): JsonResponse
    {
        $postId = $request->get('post_id');
        $likerId = $request->get('liker_id');

        $action = $action->execute($postId, $likerId);

        $result = $presenter->present($action);

        return $this->success($result);
    }
}
