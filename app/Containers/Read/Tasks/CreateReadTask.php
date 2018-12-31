<?php

namespace App\Containers\Read\Tasks;

use App\Containers\Read\Data\Repositories\ReadRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateReadTask extends Task
{

    protected $repository;

    public function __construct(ReadRepository $repository)
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
