<?php

namespace App\Containers\Page\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPageByIdAction extends Action
{
    public function run(Request $request)
    {
        $page = Apiato::call('Page@FindPageByIdTask', [$request->id]);

        return $page;
    }
}
