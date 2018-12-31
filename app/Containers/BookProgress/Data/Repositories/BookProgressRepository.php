<?php

namespace App\Containers\BookProgress\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BookProgressRepository
 */
class BookProgressRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
