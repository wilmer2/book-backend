<?php

namespace App\Containers\Like\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindLikeByIdAction extends Action
{
    public function run(Request $request)
    {
        $like = Apiato::call('Like@FindLikeByIdTask', [$request->id]);

        return $like;
    }
}
