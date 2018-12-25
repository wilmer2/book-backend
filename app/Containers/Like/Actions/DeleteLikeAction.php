<?php

namespace App\Containers\Like\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteLikeAction extends Action
{
    public function run(Request $request)
    {
        $like = Apiato::call('Like@FindLikeByIdTask', [$request->id]);
        $owner = $like->likeable();

        $deleted = Apiato::call('Like@DeleteLikeTask', [$like->id]);
      
        $owner->decrement('like_count');

        return $deleted;
    }
}
