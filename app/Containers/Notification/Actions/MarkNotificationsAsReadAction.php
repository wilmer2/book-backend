<?php

namespace App\Containers\Notification\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class MarkNotificationsAsReadAction extends Action
{
    public function run()
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        return $user->unreadNotifications()->markAsRead();
    }
}
