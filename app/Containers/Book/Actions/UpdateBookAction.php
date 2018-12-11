<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateBookAction extends Action
{
    public function run(Request $request)
    {   
        $bookEntity = Apiato::call('Book@FindBookByIdTask', [$request->id]);
        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $folder = \Config::get('book-container.folder');

        Apiato::call('Book@BookBelongToUserTask', [$user, $bookEntity]);

        $imageUrl = Apiato::call('Files@CreateFileSubAction', [
          $request, 
          $folder, 
          $bookEntity->image_url
        ]);

        $data = $request->merge(['image_url' => $imageUrl])
          ->sanitizeInput([
            'name',
            'description',
            'copyright',
            'user_id',
            'category_id',
            'image_url'
        ]);

        $bookData = array_filter($data);

        $book = Apiato::call('Book@UpdateBookTask', [$request->id, $bookData]);

        return $book;
    }
}
