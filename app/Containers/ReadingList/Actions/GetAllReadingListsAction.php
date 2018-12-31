<?php

namespace App\Containers\ReadingList\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllReadingListsAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        return $user->readingLists;
    }
}
