<?php

namespace App\Containers\Book\Tasks;

use App\Containers\Book\Data\Repositories\BookRepository;
use App\Ship\Criterias\Eloquent\OrderByCreationDateDescendingCriteria;
use App\Containers\Book\Data\Criterias\OrderByViewDescendingCriteria;
use App\Containers\Book\Data\Criterias\SearchCriteria;
use App\Containers\Book\Data\Criterias\SearchByCategoriesIdCriteria;
use App\Containers\Book\Data\Criterias\TakeLimitCriteria;

use App\Ship\Parents\Tasks\Task;

class GetTakeBooksTask extends Task
{

    protected $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository
          ->pushCriteria(new TakeLimitCriteria)
          ->get();
    }

    public function ordered()
    {
        return $this->repository->pushCriteria(new OrderByCreationDateDescendingCriteria);
    }

    public function moreViews()
    {
        return $this->repository->pushCriteria(new OrderByViewDescendingCriteria);
    }

    public function search($search)
    {
        return $this->repository->pushCriteria(new SearchCriteria($search));
    }

    public function preferences($categoriesIds)
    {
        return $this->repository
          ->pushCriteria(new SearchByCategoriesIdCriteria($categoriesIds));
    }
}
