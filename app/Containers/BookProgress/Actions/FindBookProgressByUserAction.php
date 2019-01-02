<?php

namespace App\Containers\BookProgress\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBookProgressByUserAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $book = Apiato::call('Book@FindBookByIdTask', [$request->book_id]);

        $bookProgress = Apiato::call('BookProgress@FindBookProgressByUserTask', [
          $user->id,
          $book->id,
        ]);

        Apiato::call('BookProgress@BookPercentageTask', [$book, $bookProgress]);

        return $bookProgress;
    }
}
