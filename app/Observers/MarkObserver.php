<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Mark;

class MarkObserver
{
    private $activity;

    public function __construct(Activity $activity)
    {
        $this->activity = $activity;
    }

    public function created(Mark $mark)
    {
        $this->activity->store($mark, 'Mark', 'Created');
    }

    public function updated(Mark $mark)
    {
        $this->activity->store($mark, 'Mark', 'Updated');
    }
}
