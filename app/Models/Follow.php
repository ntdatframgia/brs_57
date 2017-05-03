<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'user_id',
        'follow_id',
    ];

        /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'activityable');
    }
}
