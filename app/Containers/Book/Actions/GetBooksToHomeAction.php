<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetBooksToHomeAction extends Action
{
    public function run(Request $request)
    {
        $books = Apiato::call('Book@GetTakeBooksTask', [], [
            'moreViews',
            'ordered',
            [
                'search' => [$request->searchName]
            ],
            [
                'preferences' => [$request->categories_ids]
            ],
        ]);

        return $books;
    }
}
