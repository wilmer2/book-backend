<?php

namespace App\Containers\Like\Tasks;

use App\Containers\Like\Data\Repositories\LikeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Like\Models\Like;
use Exception;

class CreateLikeTask extends Task
{

    public function run($entity, array $data)
    {
        $like = new Like($data);

        try {
            $entity->likes()->save($like);
            $entity->like_count = $entity->likes()->count();
            $entity->save();

            return $like;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
