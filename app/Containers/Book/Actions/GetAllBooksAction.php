<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBooksAction extends Action
{
    public function run(Request $request)
    {
        $books = Apiato::call('Book@GetAllBooksTask', [], ['addRequestCriteria']);

        return $books;
    }
}
