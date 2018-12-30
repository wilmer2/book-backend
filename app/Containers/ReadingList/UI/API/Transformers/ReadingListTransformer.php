<?php

namespace App\Containers\ReadingList\UI\API\Transformers;

use App\Containers\ReadingList\Models\ReadingList;
use App\Ship\Parents\Transformers\Transformer;

class ReadingListTransformer extends Transformer
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
     * @param ReadingList $entity
     *
     * @return array
     */
    public function transform(ReadingList $entity)
    {
        $response = [
            'object' => 'ReadingList',
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
