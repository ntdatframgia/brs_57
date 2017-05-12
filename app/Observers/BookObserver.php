<?php

namespace App\Observers;

use File;
use Illuminate\Http\Request;
use App\Models\Book;

class BookObserver
{
    /**
     * Listen to the Book deleted event.
     *
     * @param  Book  $book
     * @return void
     */
    public function deleted(Book $book)
    {
        $imageUrl = public_path(config('custom.pathBook') . $book->getOriginal('img'));
        if (File::exists($imageUrl)) {
            File::delete($imageUrl);
        }
    }
    // listen ot book updating event
    // delete image if exists

    public function updating(Book $book)
    {
        if (request('img')) {
            $imageUrl = public_path(config('custom.pathBook') . $book->getOriginal('img'));
            if (File::exists($imageUrl)) {
                File::delete($imageUrl);
            }
        }
    }
}
