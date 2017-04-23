<?php

namespace App\Models;

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

    public function getPathBookImage()
    {
        return "../storage/app/book/$this->img";
    }

}
