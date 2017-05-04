<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class, 'user_id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'follow_id', 'user_id');
    }

    public function getPathAvatarAttribute()
    {
        return config('custom.pathAvatar') . $this->avatar;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
