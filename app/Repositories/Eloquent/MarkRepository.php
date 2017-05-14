<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\MarkRepositoryInterface;

class MarkRepository extends BaseRepository implements MarkRepositoryInterface
{
    function model()
    {
        return \App\Models\Mark::class;
    }
}
