<?php

namespace App\Containers\BookProgress\UI\API\Transformers;

use App\Containers\BookProgress\Models\BookProgress;
use App\Ship\Parents\Transformers\Transformer;

class BookProgressTransformer extends Transformer
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
     * @param BookProgress $entity
     *
     * @return array
     */
    public function transform(BookProgress $bookProgress)
    {
        $response = [
            'object' => 'BookProgress',
            'id' => $bookProgress->getHashedKey(),
            'percentage' => $bookProgress->percentage,
            'read_count' => $bookProgress->read_pages,
            'created_at' => $bookProgress->created_at,
            'updated_at' => $bookProgress->updated_at,

        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }
}
