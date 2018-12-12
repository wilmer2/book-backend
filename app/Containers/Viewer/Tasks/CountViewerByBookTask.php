<?php

namespace App\Containers\Viewer\Tasks;

use App\Containers\Viewer\Data\Repositories\ViewerRepository;
use App\Ship\Criterias\Eloquent\ThisBookCriteria;
use App\Ship\Parents\Tasks\Task;

class CountViewerByBookTask extends Task
{

    protected $repository;

    public function __construct(ViewerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($bookId)
    {
        $this->repository->pushCriteria(new ThisBookCriteria($bookId));
        return $this->repository->all()->count();
    }
}
