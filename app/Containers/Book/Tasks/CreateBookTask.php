<?php

namespace App\Containers\Book\Tasks;

use App\Containers\Book\Data\Repositories\BookRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateBookTask extends Task
{

    protected $repository;

    public function __construct(BookRepository $repository)
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
