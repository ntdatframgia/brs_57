<?php

namespace App\Observers;

use App\Models\Follow;
use App\Models\Activity;

class FollowObserver
{
    private $activity;

    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function created(Follow $follow)
    {
        $this->activity->store($follow, 'Follow', 'Created');
    }

    public function deleted(Follow $follow)
    {
        $this->activity->store($follow, 'Follow', 'Deleted');
    }
}
