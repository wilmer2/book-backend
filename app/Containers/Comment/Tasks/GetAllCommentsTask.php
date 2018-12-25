<?php

namespace App\Containers\Comment\Tasks;

use App\Containers\Comment\Data\Repositories\CommentRepository;
use App\Containers\Comment\Data\Criterias\FindByTypeCriteria;
use App\Ship\Criterias\Eloquent\OrderByCreationDateDescendingCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllCommentsTask extends Task
{

    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($commentableId, $commmentableType)
    {
        return $this->repository
          ->pushCriteria(new OrderByCreationDateDescendingCriteria())
          ->pushCriteria(new FindByTypeCriteria($commentableId, $commmentableType))
          ->paginate();
         
    }
}
