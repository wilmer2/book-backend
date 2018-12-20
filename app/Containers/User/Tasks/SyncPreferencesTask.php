<?php

namespace App\Containers\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\User;


class SyncPreferencesTask extends Task
{

    public function run(User $user, $categoriesIds)
    {
        $categoriesIds = (array) $categoriesIds;
        
        return $user->preferences()->sync($categoriesIds);
    }
}
