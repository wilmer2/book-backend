<?php

namespace App\Containers\Book\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BookRepository
 */
class BookRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
    ];

}
