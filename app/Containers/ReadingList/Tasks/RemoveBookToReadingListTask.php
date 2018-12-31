<?php

namespace App\Containers\ReadingList\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\ReadingList\Models\ReadingList;
use App\Containers\Book\Models\Book;


class RemoveBookToReadingListTask extends Task
{

    public function run(ReadingList $readinglist, Book $book)
    {
        $readinglist->books()->detach($book->id);
    }
}
