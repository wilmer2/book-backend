<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBooksByUserAction extends Action
{
    public function run(Request $request)
    {
        $books = Apiato::call('Book@GetAllBooksTask', [], [
          ['byUserId' => [$request->user_id]],
          'ordered',
        ]);

        return $books;
    }
}
