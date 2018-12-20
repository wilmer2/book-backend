<?php

namespace App\Containers\Page\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPagesByBookAction extends Action
{
    public function run(Request $request)
    { 
        $pages = Apiato::call('Page@GetAllPagesTask', [], [
          ['byBookId' => [$request->book_id]],
          $request->has('public') ? 'isPublic' : '',
          'ordered',
        ]);

        return $pages;
    }
}
