<?php

namespace App\Containers\Like\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class LikeRepository
 */
class LikeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
