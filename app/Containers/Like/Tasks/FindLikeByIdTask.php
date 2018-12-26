<?php

namespace App\Containers\Like\Tasks;

use App\Containers\Like\Data\Repositories\LikeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindLikeByIdTask extends Task
{

    protected $repository;

    public function __construct(LikeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
