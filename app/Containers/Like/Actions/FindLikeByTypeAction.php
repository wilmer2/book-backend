<?php

namespace App\Containers\Like\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use App\Containers\Book\Models\Book;
use App\Containers\Page\Models\Page; 
use App\Containers\Comment\Models\Comment; 

use Apiato\Core\Foundation\Facades\Apiato;

class FindLikeByTypeAction extends Action
{
    public function run(Request $request)
    {
        if ($request->has('book_id')) {
          $params = [$request->book_id, Book::class];
        } else if ($request->has('page_id')) {
          $params = [$request->page_id, Page::class];
        } else if ($request->has('comment_id')) {
          $params = [$request->comment_id, Comment::class];
        }

        $user = Apiato::call('Authentication@GetAuthenticatedUserTask');
        $params[] = $user->id;

        $like = Apiato::call('Like@FindLikeByTypeTask', $params);

        return $like;
    }
}
