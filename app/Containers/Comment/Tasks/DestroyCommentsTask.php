<?php

namespace App\Containers\Comment\Tasks;

use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Containers\Comment\Models\Comment;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DestroyCommentsTask extends Task
{

    public function run(array $ids)
    {
        if (count($ids) > 0) {
          Comment::destroy($ids);
        }
    }
}
