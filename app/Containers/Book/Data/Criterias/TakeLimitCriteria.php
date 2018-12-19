<?php

namespace App\Containers\Book\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ClientsCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class TakeLimitCriteria extends Criteria
{

    /**
     * @var string
     */
    private $limit;

    /**
     * RoleCriteria constructor.
     *
     * @param $limit
     */
    public function __construct($limit = 5)
    {
        $this->limit = $limit;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->take($this->limit);
    }
}
