<?php

namespace App\Containers\Page\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePageAction extends Action
{
    public function run(Request $request)
    {
        $page = Apiato::call('Page@FindPageByIdTask', [$request->id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');

        Apiato::call('Book@BookBelongToUserTask', [$user, $page->book]);
        Apiato::call('Files@DeleteFileTask', [$page->image_url]);

        return Apiato::call('Page@DeletePageTask', [$request->id]);
    }
}
