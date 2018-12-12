<?php

namespace App\Containers\Book\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Book\Models\Book;
class AddViewToBookTask extends Task
{

    public function run(Book $book, $views)
    {
        $book->views = $views;
        $book->save();

        return $book;
    }
}
