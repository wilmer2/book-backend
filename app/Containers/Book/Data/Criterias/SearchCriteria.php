<?php

namespace App\Containers\Book\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ClientsCriteria.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class SearchCriteria extends Criteria
{

    /**
     * @var string
     */
    private $search;

    /**
     * RoleCriteria constructor.
     *
     * @param $search
     */
    public function __construct($search = null)
    {
        $this->search = $search;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        $search = $this->search;

        return $model->when($search, function ($books, $search) {
            return $books->where('name', 'Like', '%'. $search . '%')
              ->orWhereHas('category', function ($category) use ($search) {
                  $category->where('name', 'Like', '%'. $search .'%');
              });
        });
    }
}
