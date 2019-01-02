<?php

namespace App\Containers\Read\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ReadRepository
 */
class ReadRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
