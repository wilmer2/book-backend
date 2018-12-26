<?php

namespace App\Containers\Like\Tasks;

use App\Containers\Like\Data\Repositories\LikeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindLikeByTypeTask extends Task
{

    protected $repository;

    public function __construct(LikeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($likeableId, $likeableType, $userId)
    {
        try {
            return $this->repository->findWhere([
              'likeable_id' => $likeableId,
              'likeable_type' => $likeableType,
              'user_id' => $userId,
            ]);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
