<?php

namespace App\Containers\BookProgress\Tasks;

use App\Containers\BookProgress\Data\Repositories\BookProgressRepository;
use App\Ship\Parents\Tasks\Task;

class FindBookProgressByUserTask extends Task
{

    protected $repository;

    public function __construct(BookProgressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($userId, $bookId)
    {
        return $this->repository->findWhere([
          'user_id' => $userId,
          'book_id' => $bookId,
        ])->first();
    }
}
