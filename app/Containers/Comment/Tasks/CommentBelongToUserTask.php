<?php

namespace App\Containers\Comment\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\User;
use App\Containers\Comment\Models\Comment;
use App\Ship\Exceptions\NotAuthorizedResourceException;


class CommentBelongToUserTask extends Task
{

    public function run(User $user, Comment $comment)
    {
        if ($user->id != $comment->user_id) {
          throw new NotAuthorizedResourceException();
        }
    }
}
