<?php

namespace App\Containers\ReadingList\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;

class AddBookToReadingListAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        $readingList = Apiato::call('ReadingList@FindReadingListByUserTask', [
          $user, 
          $request->id,
        ]);

        $book = Apiato::call('Book@FindBookByIdTask', [$request->book_id]);

        $readingList->books()->syncWithoutDetaching($book->id);

        return $readingList;
    }
}
