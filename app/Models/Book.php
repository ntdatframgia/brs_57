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
        'img',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
