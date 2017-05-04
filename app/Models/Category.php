<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $dates = ['deleted_at'];
    use SoftDeletes;
    protected $fillable = [
        'name',
        'parent_id',
    ];


    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
