<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBookAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Book@DeleteBookTask', [$request->id]);
    }
}
