<?php

namespace App\Containers\Comment\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Comment\Notifications\CommentNotification;
use App\Containers\User\Models\User;

class SendCommentNotificationTask extends Task
{

    public function run(
      User $issuing, 
      User $receiver, 
      $entity, 
      $message
    )
    {
        if ($issuing->id != $receiver->id) {
          $receiver->notify(new CommentNotification($entity, $message, $issuing->name));
        }
    }
}
