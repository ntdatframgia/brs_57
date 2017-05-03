<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'public_date',
        'number_of_page',
        'category_id',
        'rate',
        'img',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImgAttribute($value)
    {
        return config('custom.pathBookImage').$value;
    }

    public function getCountCommentOfBookAttribute()
    {
        return $this->comments()->count();
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function mark()
    {
        return $this->hasOne(Mark::Class)->where('user_id', Auth::user()->id);
    }
}
