<?php

namespace App\Containers\ReadingList\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindReadingListByIdAction extends Action
{
    public function run(Request $request)
    {
        $readinglist = Apiato::call('ReadingList@FindReadingListByIdTask', [$request->id]);

        return $readinglist;
    }
}
