<?php

namespace App\Containers\Page\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PageRepository
 */
class PageRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
