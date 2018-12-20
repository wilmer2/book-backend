<?php

namespace App\Containers\Page\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdatePageAction extends Action
{
    public function run(Request $request)
    {
        $page = Apiato::call('Page@FindPageByIdTask', [$request->id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $folder = \Config::get('page-container.folder');

        Apiato::call('Book@BookBelongToUserTask', [$user, $page->book]);

        $imageUrl = Apiato::call('Files@CreateFileSubAction', [
          $request, 
          $folder,
          $page->image_url
        ]);

        $data = $request->merge(['image_url' => $imageUrl])
          ->sanitizeInput([
            'text',
            'image_url',
        ]);

        $pageData = array_filter($data);
        $page = Apiato::call('Page@UpdatePageTask', [$request->id, $pageData]);

        return $page;
    }
}
