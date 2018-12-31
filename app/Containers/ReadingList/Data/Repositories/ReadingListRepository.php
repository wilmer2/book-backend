<?php

namespace App\Containers\ReadingList\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ReadingListRepository
 */
class ReadingListRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
