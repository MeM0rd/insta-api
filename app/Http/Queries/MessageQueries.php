<?php

namespace App\Http\Queries;

use App\Models\Message;

class MessageQueries
{
    public function getFirstMessages(int $userId): array
    {
        return Message::whereUserId(1)->orderByDesc('created_at')->get()->groupBy('sender_id')->toArray();
    }
}
