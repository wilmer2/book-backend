<?php

namespace App\Containers\Notification\UI\API\Controllers;

use App\Containers\Notification\UI\API\Requests\CreateNotificationRequest;
use App\Containers\Notification\UI\API\Requests\DeleteNotificationRequest;
use App\Containers\Notification\UI\API\Requests\GetAllNotificationsRequest;
use App\Containers\Notification\UI\API\Requests\FindNotificationByIdRequest;
use App\Containers\Notification\UI\API\Requests\UpdateNotificationRequest;
use App\Containers\Notification\UI\API\Requests\MarkNotificationsAsReadRequest;
use App\Containers\Notification\UI\API\Transformers\NotificationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Notification\UI\API\Controllers
 */
class Controller extends ApiController
{

    /**
     * @param GetAllNotificationsRequest $request
     * @return array
     */
    public function getAllNotifications(GetAllNotificationsRequest $request)
    {
        $notifications = Apiato::call('Notification@GetAllNotificationsAction', [$request]);

        return $this->transform($notifications, NotificationTransformer::class, [], [], 
          \Config::get('notification-container.resources-key'));
    }

    public function markNotificationsAsRead(MarkNotificationsAsReadRequest $request)
    {
        $notifications = Apiato::call('Notification@MarkNotificationsAsReadAction', [$request]);

        return $this->transform($notifications, NotificationTransformer::class, [], [],
          \Config::get('notification-container.resources-key'));
    }
}
