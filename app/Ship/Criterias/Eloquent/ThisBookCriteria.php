<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ThisUserCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class ThisBookCriteria extends Criteria
{

    /**
     * @var int
     */
    private $bookId;

    /**
     * ThisUserCriteria constructor.
     *
     * @param $userId
     */
    public function __construct($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('book_id', $this->bookId);
    }

}
