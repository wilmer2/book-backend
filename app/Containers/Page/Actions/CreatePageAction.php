<?php

namespace App\Containers\Page\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreatePageAction extends Action
{
    public function run(Request $request)
    {
        $folder = \Config::get('page-container.folder');
        $imageUrl = Apiato::call('Files@CreateFileSubAction', [$request, $folder]);

        $data = $request->merge(['image_url' => $imageUrl])
          ->sanitizeInput([
            'book_id',
            'text',
            'image_url'
        ]);

        $page = Apiato::call('Page@CreatePageTask', [$data]);

        return $page;
    }
}
