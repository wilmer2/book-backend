<?php

namespace App\Containers\ReadingList\Tasks;

use App\Containers\ReadingList\Data\Repositories\ReadingListRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindReadingListByIdTask extends Task
{

    protected $repository;

    public function __construct(ReadingListRepository $repository)
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
