<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Presenters\MessagePresenter;
use App\Traits\JsonResponsible;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    use JsonResponsible;

    public function index(MessageRequest $request, MessagePresenter $presenter): JsonResponse
    {
        $userId = $request->get('user_id');

        $result = $presenter->present($userId);

        return $this->success($result);
    }
}
