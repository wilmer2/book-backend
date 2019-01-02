<?php

namespace App\Containers\BookProgress\Tasks;

use App\Containers\Book\Models\Book;
use App\Containers\BookProgress\Models\BookProgress;

use App\Ship\Parents\Tasks\Task;

class BookPercentageTask extends Task
{

    public function run(Book $book, BookProgress $bookProgress)
    {
        $totalPages = $book->pages()->count();

        $bookProgress->percentage = ($bookProgress->read_pages / $totalPages) * 100;

        $bookProgress->save();
    }
}
