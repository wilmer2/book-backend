<?php

namespace App\Containers\Notification\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Notification\Models\Notification;
use App\Containers\Notification\Values\NotificationValue;

class GetAllNotificationsAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        
        return $user->notifications()->paginate();
    }
}
