<?php

namespace App\Containers\ReadingList\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteReadingListAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ReadingList@DeleteReadingListTask', [$request->id]);
    }
}
