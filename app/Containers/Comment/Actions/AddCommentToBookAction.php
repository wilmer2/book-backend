<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

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

        return $comment;
    }
}
