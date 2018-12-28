<?php

namespace App\Containers\Comment\Notifications;

use App\Containers\Book\Models\Book;
use App\Containers\Page\Models\Page;
use App\Ship\Parents\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class CommentNotification
 */
class CommentNotification extends Notification implements ShouldQueue
{

    use Queueable;

    protected $commented;
    protected $message;
    protected $userName;

    public function __construct($commented, $message, $userName)
    {
        $this->commented = $commented;
        $this->message = $message;
        $this->userName = $userName;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast', 'mail'];
    }

    public function toArray($notifiable)
    {
        $commented = $this->commented;
       
        $notification = [
          'notify_message' => $this->userName.' '.$this->message,
        ];

        if ($commented instanceof Book) {
          $notification = array_add($notification, 'book_id', $commented->getHashedKey());
        } else if($commented instanceof Page) {
          $notification = array_add($notification, 'page_id', $commented->getHashedKey());
        }

        return $notification;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                      ->greeting('Hola!')
                      ->line('tienes un comentario pendiente');
    }
}
