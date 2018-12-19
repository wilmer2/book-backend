<?php

namespace App\Containers\Viewer\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ViewerRepository
 */
class ViewerRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
