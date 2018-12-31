<?php

namespace App\Containers\ReadingList\Tasks;

use App\Containers\ReadingList\Data\Repositories\ReadingListRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMainReadingListsTask extends Task
{

    protected $repository;

    public function __construct(ReadingListRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->findWhere(['main' => 1]);
    }
}
