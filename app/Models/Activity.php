<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'activityable_id',
        'activityable_type',
        'user_id',
        'action',
        'like_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activityable()
    {
        return $this->morphTo();
    }



    public function store($data, $type, $action)
    {
        $logActivity = new Activity;
        $logActivity->activityable_type = $type;
        $logActivity->activityable_id = $data->id;
        $logActivity->user_id = $data->user_id;
        $logActivity->action = $action;
        $logActivity->save();
    }
}
