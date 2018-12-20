<?php

namespace App\Containers\Page\Tasks;

use App\Containers\Page\Data\Repositories\PageRepository;
use App\Ship\Criterias\Eloquent\ThisBookCriteria;
use App\Ship\Criterias\Eloquent\OrderByCreationDateAscendingCriteria;
use App\Containers\Page\Data\Criterias\PublicPagesCriteria;
use App\Ship\Parents\Tasks\Task;


class GetAllPagesTask extends Task
{

    protected $repository;

    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }

    public function byBookId($bookId)
    {
        $this->repository->pushCriteria(new ThisBookCriteria($bookId));
    }

    public function ordered()
    {
        $this->repository
          ->pushCriteria(new OrderByCreationDateAscendingCriteria());
    }

    public function isPublic()
    {
        $this->repository->pushCriteria(new PublicPagesCriteria());
    }
}
