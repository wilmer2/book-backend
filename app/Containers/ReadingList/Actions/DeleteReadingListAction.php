<?php

namespace App\Containers\ReadingList\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteReadingListAction extends Action
{
    public function run(Request $request)
    {
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        $readingList = Apiato::call('ReadingList@FindReadingListByUserTask', [
          $user, 
          $request->id,
        ]);

        return Apiato::call('ReadingList@DeleteReadingListTask', [$readingList->id]);
    }
}
