<?php

namespace App\Containers\Book\UI\API\Transformers;

use App\Containers\Book\Models\Book;
use App\Ship\Parents\Transformers\Transformer;

class BookTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Book $entity
     *
     * @return array
     */
    public function transform(Book $entity)
    {
        $response = [
            'object' => 'Book',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
