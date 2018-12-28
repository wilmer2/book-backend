<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Comment\Notifications\CommentNotification;

class AddCommentToBookAction extends Action
{
    public function run(Request $request)
    {
        $book = Apiato::call('Book@FindBookByIdTask', [$request->book_id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        $data = $request->merge(['user_id' => $user->id])
          ->sanitizeInput([
            'body',
            'user_id',
        ]);

        $comment = Apiato::call('Comment@CreateCommentTask', [$book, $data]);
        $bookMessage = \Config::get('comment-container.comment-to-book');

        $book->user->notify(new CommentNotification($book, $bookMessage, $user->name));

        return $comment;
    }
}
