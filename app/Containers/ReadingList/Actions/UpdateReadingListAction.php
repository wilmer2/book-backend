<?php

namespace App\Containers\ReadingList\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateReadingListAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
        ]);

        $readinglist = Apiato::call('ReadingList@UpdateReadingListTask', [$request->id, $data]);

        return $readinglist;
    }
}
