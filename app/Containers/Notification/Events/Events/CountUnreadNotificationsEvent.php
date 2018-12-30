<?php

namespace App\Containers\Notification\Events\Events;

use App\Ship\Parents\Events\Event;
use Illuminate\Queue\SerializesModels;
use App\Containers\User\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class CountUnreadNotificationsEvent
 */
class CountUnreadNotificationsEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    private $user;
    public $count_unread_notifications;
    /**
     * CountUnreadNotificationsEvent constructor.
     *
     * @param $entity
     */
    public function __construct(User $user, $countUnreadNotifications)
    {
        $this->user = $user;
        $this->count_unread_notifications = $countUnreadNotifications;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('App.User.'. $this->user->id);
    }
}
