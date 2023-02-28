<?php

namespace App\Presenters;

use App\Http\Queries\PostQueries;
use Auth;
use Illuminate\Support\Collection;

class PostListPresenter
{
    protected PostQueries $postQueries;

    public function __construct(PostQueries $postQueries)
    {
        $this->postQueries = $postQueries;
    }

    public function present(): Collection
    {
        if (Auth::user()) {
            return $this->postQueries->getPosts();
        }

        return $this->postQueries->getPublicPosts();
    }
}
