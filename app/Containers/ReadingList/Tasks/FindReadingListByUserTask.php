<?php

namespace App\Containers\ReadingList\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\NotFoundException;
use App\Containers\User\Models\User;
use Exception;

class FindReadingListByUserTask extends Task
{

    public function run(User $user, $readingListId)
    {
        $readingList = $user->readingLists()
          ->where('reading_list_id', $readingListId)
          ->where('main', 0)
          ->first();

        if (!$readingList) {
          throw new NotFoundException();
        }

        return $readingList;
    }
}
