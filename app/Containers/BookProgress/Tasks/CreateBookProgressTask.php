<?php

namespace App\Containers\BookProgress\Tasks;

use App\Containers\BookProgress\Data\Repositories\BookProgressRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBookProgressTask extends Task
{

    protected $repository;

    public function __construct(BookProgressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
