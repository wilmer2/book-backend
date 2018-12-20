<?php

namespace App\Containers\Page\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPagesAction extends Action
{
    public function run(Request $request)
    {
        $pages = Apiato::call('Page@GetAllPagesTask', [], ['addRequestCriteria']);

        return $pages;
    }
}
