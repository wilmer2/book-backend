<?php

namespace App\Containers\Book\Tasks;

use App\Containers\Book\Data\Repositories\BookRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindBookByIdTask extends Task
{

    protected $repository;

    public function __construct(BookRepository $repository)
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
