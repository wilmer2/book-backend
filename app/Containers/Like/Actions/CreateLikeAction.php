<?php

namespace App\Containers\Like\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateLikeAction extends Action
{
    public function run(Request $request)
    {
        if ($request->has('book_id')) {
          $entity = Apiato::call('Book@FindBookByIdTask', [$request->book_id]);
        } else if ($request->has('page_id')) {
          $entity = Apiato::call('Page@FindPageByIdTask', [$request->page_id]);
        } else if ($request->has('comment_id')) {
          $entity = Apiato::call('Comment@FindCommentByIdTask', [$request->comment_id]);
        }

        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        $data = $request->merge(['user_id' => $user->id])
          ->sanitizeInput([
            'user_id',
        ]);

        $like = Apiato::call('Like@CreateLikeTask', [$entity, $data]);

        return $like;
    }
}
