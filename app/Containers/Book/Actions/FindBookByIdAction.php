<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindBookByIdAction extends Action
{
    public function run(Request $request)
    {
        $book = Apiato::call('Book@FindBookByIdTask', [$request->id]);

        return $book;
    }
}
