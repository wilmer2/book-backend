<?php

namespace App\Containers\BookProgress\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;
use App\Ship\Exceptions\NotAuthorizedResourceException;

class BookInProgressAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $book = Apiato::call('Book@FindBookByIdTask', [$request->book_id]);

        if ($book->user_id == $user->id) {
          throw new NotAuthorizedResourceException();
        }
        
        $read = Apiato::call('Read@FindReadByUserTask', [$user->id, $request->page_id]);

        $bookProgress = Apiato::call('BookProgress@FindBookProgressByUserTask', [
          $user->id,
          $book->id,
        ]);

        if ($read) {
          return $bookProgress;
        }

        $read = Apiato::call('Read@CreateReadTask', [[
            'user_id' => $user->id, 
            'page_id' => $request->page_id,
          ],
        ]);

        $bookProgress = $bookProgress ?? Apiato::call('BookProgress@CreateBookProgressTask', [[
            'user_id' => $user->id,
            'book_id' => $book->id,
          ],
        ]);

        Apiato::call('BookProgress@BookPercentageTask', [$book, $bookProgress]);

        return $bookProgress;
    }
}
