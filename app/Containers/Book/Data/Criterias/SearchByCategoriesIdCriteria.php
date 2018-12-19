<?php

namespace App\Containers\Book\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ClientsCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class SearchByCategoriesIdCriteria extends Criteria
{

    /**
     * @var string
     */
    private $categoriesIds;

    /**
     * RoleCriteria constructor.
     *
     * @param $categoriesId
     */
    public function __construct($categoriesIds = null)
    {
        $this->categoriesIds = $categoriesIds;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        $categoriesIds = $this->categoriesIds;

        return $model->when($categoriesIds, function ($books, $categoriesIds) {
            return $books->whereHas('category', function ($category) use ($categoriesIds) {
                $category->whereIn('id', $categoriesIds);
            });
        });
    }
}
