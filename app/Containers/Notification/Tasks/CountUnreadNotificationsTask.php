<?php

namespace App\Containers\Notification\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\User;
use App\Containers\Notification\Events\Events\CountUnreadNotificationsEvent;

class CountUnreadNotificationsTask extends Task
{

    public function run(User $user)
    {
        $countUnreadNotifications = $user->unreadNotifications()->count();
        
        broadcast(new CountUnreadNotificationsEvent($user, $countUnreadNotifications))->toOthers();
    }
}
