<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;


class CreateBookAction extends Action
{
    public function run(Request $request)
    {
        $folder = 'books';
        $imageUrl = Apiato::call('Files@StoreFileTask', [$request->file('file'), $folder]);

        $data = $request->merge(['image_url' => $imageUrl])
          ->sanitizeInput([
            'name',
            'description',
            'copyright',
            'user_id',
            'category_id',
            'image_url'
        ]);

        $book = Apiato::call('Book@CreateBookTask', [$data]);

        return $book;
    }
}
