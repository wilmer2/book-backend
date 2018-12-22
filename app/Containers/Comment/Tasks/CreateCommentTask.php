<?php

namespace App\Containers\Comment\Tasks;

use App\Containers\Comment\Models\Comment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCommentTask extends Task
{

    public function run($entity, array $data)
    {
        $comment = new Comment($data);

        try {
            return $entity->comments()->save($comment);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
