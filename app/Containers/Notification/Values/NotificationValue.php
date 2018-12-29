<?php

namespace App\Containers\Notification\Values;

use App\Ship\Parents\Values\Value;
use Illuminate\Notifications\DatabaseNotification;

class NotificationValue extends Value
{   

    public $id;
    public $data;
    public $created_at;
    public $updated_at;
    public $read_at;

    public function __construct(DatabaseNotification $notification)
    {
        $this->id = $notification->id;
        $this->data = $notification->data;
        $this->created_at = $notification->created_at;
        $this->updated_at = $notification->updated_at;
        $this->read_at = $notification->read_at;
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'notification';

}
