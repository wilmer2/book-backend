<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Comment\Notifications\CommentNotification;

class AddCommentToPageAction extends Action
{
    public function run(Request $request)
    {
        $page = Apiato::call('Page@FindPageByIdTask', [$request->page_id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        $data = $request->merge(['user_id' => $user->id])
          ->sanitizeInput([
            'body',
            'user_id',
        ]);

        $comment = Apiato::call('Comment@CreateCommentTask', [$page, $data]);

        $pageMessage = \Config::get('comment-container.comment-to-page');

        $page->book->user->notify(new CommentNotification($page, $pageMessage, $user->name));

        return $comment;
    }
}
