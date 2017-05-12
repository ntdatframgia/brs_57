<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author',
        'number_of_page',
        'category_id',
        'rate',
        'public_date',
        'title',
        'description',
        'img',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImgAttribute($value)
    {
        return $this->img = asset(config('custom.pathBook').$value);
    }

    public function setPublicDateAttribute($value)
    {
        $this->attributes['public_date'] = date('Y-m-d', strtotime($value));
    }

    public function getPublicDateAtrribute($value)
    {
        return $this->public_date = date('d-m-Y', strtotime($value));
    }
}
