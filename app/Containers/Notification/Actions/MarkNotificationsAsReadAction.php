<?php

namespace App\Containers\Notification\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;


class MarkNotificationsAsReadAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $user->unreadNotifications()->update(['read_at' => now()]);

        Apiato::call('Notification@CountUnreadNotificationsTask', [$user]);
    }
}
