<?php

namespace App\Containers\ReadingList\Tasks;

use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class AddUserToReadingListsTask extends Task
{

    public function run(User $user, array $readinglistIds)
    {
        foreach ($readinglistIds as $readinglistId) {
          $user->readingLists()->attach($readinglistId);
        }
    }
}
