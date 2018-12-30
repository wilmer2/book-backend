<?php

namespace App\Containers\ReadingList\Tasks;

use App\Containers\ReadingList\Data\Repositories\ReadingListRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateReadingListTask extends Task
{

    protected $repository;

    public function __construct(ReadingListRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
