<?php

namespace App\Containers\ReadingList\Tasks;

use App\Containers\ReadingList\Models\ReadingList;
use App\Containers\Book\Models\Book;

use App\Ship\Parents\Tasks\Task;

class AddBookToReadingListTask extends Task
{

    public function run(ReadingList $readinglist, Book $book)
    {
        $readinglist->books()->syncWithoutDetaching($book->id);
    }
}
