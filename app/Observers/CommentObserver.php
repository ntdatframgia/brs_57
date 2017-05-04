<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\Activity;

class CommentObserver
{
    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function created(Comment $comment)
    {
        $this->activity->store($comment, 'Comment', 'Created');
    }
}
