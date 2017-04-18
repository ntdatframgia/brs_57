<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'activitytable_id',
        'activitytable_type',
        'user_id',
        'like_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activitytable()
    {
        return $this->morphTo();
    }
}
