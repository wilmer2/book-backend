<?php

namespace App\Containers\ReadingList\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateReadingListAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
        ]);

        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $readinglist = Apiato::call('ReadingList@CreateReadingListTask', [$data]);

        $user->readingLists()->attach($readinglist->id);

        return $readinglist;
    }
}
