<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Comment\Notifications\CommentNotification;
use App\Containers\Book\Models\Book;

class AddCommentToCommentAction extends Action
{
    public function run(Request $request)
    {
        $commentParent = Apiato::call('Comment@FindCommentByIdTask', [$request->id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        $data = $request->merge(['user_id' => $user->id])
          ->sanitizeInput([
            'body',
            'user_id',
        ]);

        $comment = Apiato::call('Comment@CreateCommentTask', [$commentParent, $data]);
        $owner = $commentParent->commentable;
        $commentMessage = \Config::get('comment-container.comment-to-comment');

        $ownerUser = $owner instanceof Book ? $owner->user : $owner->book->user;

        Apiato::call('Comment@SendCommentNotificationTask', [
          $user,
          $ownerUser,
          $owner,
          $commentMessage,
        ]);

        return $comment;
    }
}
