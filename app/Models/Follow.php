<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'user_id',
        'follow_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function follow()
    {
        return $this->belongsTo(User::class, 'follow_id');
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'activitytable');
    }
}
