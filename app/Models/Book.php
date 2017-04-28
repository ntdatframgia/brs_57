<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

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



    protected $dateFormat = 'Y-m-d';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPathBookImageAttribute()
    {
        return config('custom.pathBookImage').$this->img;
    }

    public function getCountCommentOfBookAttribute()
    {
        return $this->comments()->count();
    }

    public function marks()
    {
        return $this->hasMany(Mark::Class);
    }

    public function myMark()
    {
        return $this->marks()->where('user_id', Auth::user()->id);
    }

    public function mark()
    {
        return $this->hasOne(Mark::Class)->where('user_id', Auth::user()->id);
    }
}
