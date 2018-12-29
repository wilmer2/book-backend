<?php

namespace App\Containers\Notification\UI\API\Transformers;

use App\Containers\Notification\Models\Notification;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\Notification\Values\NotificationValue;
use Illuminate\Notifications\DatabaseNotification;


class NotificationTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Notification $notification
     *
     * @return array
     */
    public function transform(DatabaseNotification $notification)
    {
        $response = [
            'object' => 'Notification',
            'id' => $notification->id,
            'data' => $notification->data,
            'read_at' => $notification->read_at,
            'created_at' => $notification->created_at,
            'updated_at' => $notification->updated_at,

        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }
}
