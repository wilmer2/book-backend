<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCommentAction extends Action
{
    public function run(Request $request)
    {
        $comment = Apiato::call('Comment@FindCommentByIdTask', [$request->id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        Apiato::call('Comment@CommentBelongToUserTask', [$user, $comment]);

        $data = $request->sanitizeInput([
            'body',
        ]);

        $comment = Apiato::call('Comment@UpdateCommentTask', [$comment->id, $data]);

        return $comment;
    }
}
