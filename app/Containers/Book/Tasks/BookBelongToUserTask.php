<?php

namespace App\Containers\Book\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\User;
use App\Containers\Book\Models\Book;
use App\Ship\Exceptions\NotAuthorizedResourceException;


class BookBelongToUserTask extends Task
{

    public function run(User $user, Book $book)
    {
        if ($user->id != $book->user_id) {
          throw new NotAuthorizedResourceException();
        }
    }
}
