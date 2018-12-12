<?php

namespace App\Containers\Book\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;

class AddViewerAction extends Action
{
    public function run(Request $request)
    {
        $book = Apiato::call('Book@FindBookByIdTask', [$request->id]);
        $user = Apiato::call('Authentication@GetUserFromApiTask');

        $data = [
          'user_id' => $user ? $user->id : null,
          'book_id' => $book->id,
          'ip' => !$user ? \Request::ip() : null,
        ];

        if (!$user) {
          $viewer = Apiato::call('Viewer@FindViewerByIpAndBookTask', 
            [
              $data['ip'], 
              $book->id
            ]);
        } else {
          $viewer = Apiato::call('Viewer@FindViewerByUserAndBookTask', 
            [
              $user->id, 
              $book->id
            ]);
        }

        if (!$viewer) {
          Apiato::call('Viewer@CreateViewerTask', [$data]);

          $views = Apiato::call('Viewer@CountViewerByBookTask', [$book->id]);
          $book = Apiato::call('Book@AddViewToBookTask', [$book, $views]);
        }

        return $book;
    }
}
