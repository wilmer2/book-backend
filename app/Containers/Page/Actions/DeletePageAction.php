<?php

namespace App\Containers\Page\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePageAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Page@DeletePageTask', [$request->id]);
    }
}
