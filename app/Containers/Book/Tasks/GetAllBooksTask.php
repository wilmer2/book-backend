<?php

namespace App\Containers\Book\Tasks;

use App\Containers\Book\Data\Repositories\BookRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllBooksTask extends Task
{

    protected $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
