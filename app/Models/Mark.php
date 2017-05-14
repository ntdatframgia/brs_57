<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class Mark extends Model
{
    protected $fillable = [
        'read_status',
        'favorite',
        'user_id',
        'book_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'activitytable');
    }
}
