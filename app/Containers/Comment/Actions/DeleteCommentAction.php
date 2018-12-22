<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCommentAction extends Action
{
    public function run(Request $request)
    {
        $comment = Apiato::call('Comment@FindCommentByIdTask', [$request->id]);

        $commentsIds = $comment->comments()
          ->get()
          ->pluck('id')
          ->toArray();
          
        Apiato::call('Comment@DestroyCommentsTask', [$commentsIds]);

        return Apiato::call('Comment@DeleteCommentTask', [$request->id]);
    }
}
