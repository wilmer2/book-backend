<?php

namespace App\Containers\Comment\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ClientsCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class FindByTypeCriteria extends Criteria
{

    /**
     * @var string
     */
    private $commentableId;
    private $commentableType;


    /**
     * RoleCriteria constructor.
     *
     * @param $categoriesId
     */
    public function __construct($commentableId, $commentableType)
    {
        $this->commentableId = $commentableId;
        $this->commentableType = $commentableType;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        
        return $model->where('commentable_id', $this->commentableId)
          ->where('commentable_type', $this->commentableType);
    }
}
