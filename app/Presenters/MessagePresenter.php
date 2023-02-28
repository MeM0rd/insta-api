<?php

namespace App\Presenters;

use App\Http\Queries\MessageQueries;

class MessagePresenter
{
    protected MessageQueries $messageQueries;

    public function __construct(MessageQueries $messageQueries)
    {
        $this->messageQueries = $messageQueries;
    }

    public function present(int $userId): array
    {
        $result = [];

        $groups = $this->messageQueries->getFirstMessages($userId);

        foreach ($groups as $group) {
            $result[] = reset($group);
        }

        return $result;
    }
}
