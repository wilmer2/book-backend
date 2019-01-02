<?php

namespace App\Containers\Read\Tasks;

use App\Ship\Parents\Tasks\Task;
use App\Containers\Read\Data\Repositories\ReadRepository;

class FindReadByUserTask extends Task
{

    protected $repository;

    public function __construct(ReadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($userId, $pageId)
    {
        return $this->repository->findWhere([
          'user_id' => $userId,
          'page_id' => $pageId,
          
        ])->first();
    }
}
