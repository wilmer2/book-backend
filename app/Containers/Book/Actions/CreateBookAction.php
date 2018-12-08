<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateBookAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $book = Apiato::call('Book@CreateBookTask', [$data]);

        return $book;
    }
}
