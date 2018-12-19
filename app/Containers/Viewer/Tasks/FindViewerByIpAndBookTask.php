<?php

namespace App\Containers\Viewer\Tasks;

use App\Containers\Viewer\Data\Repositories\ViewerRepository;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Criterias\Eloquent\ThisBookCriteria;
use App\Containers\Viewer\Data\Criterias\FindByIpCriteria;


class FindViewerByIpAndBookTask extends Task
{

    protected $repository;

    public function __construct(ViewerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($ip, $bookId)
    {
        return $this->repository
          ->pushCriteria(new ThisBookCriteria($bookId))
          ->pushCriteria(new FindByIpCriteria($ip))
          ->first();
    }
}
