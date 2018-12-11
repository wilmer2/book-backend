<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBookAction extends Action
{
    public function run(Request $request)
    {
        $book = Apiato::call('Book@FindBookByIdTask', [$request->id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        
        Apiato::call('Book@BookBelongToUserTask', [$user, $book]);
        Apiato::call('Files@DeleteFileTask', [$book->image_url]);

        return Apiato::call('Book@DeleteBookTask', [$book->id]);
    }
}
