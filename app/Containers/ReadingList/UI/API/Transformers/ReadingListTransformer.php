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
     * @param ReadingList $readingList
     *
     * @return array
     */
    public function transform(ReadingList $readingList)
    {
        $response = [
            'object' => 'ReadingList',
            'id' => $readingList->getHashedKey(),
            'name' => $readingList->name,
            'created_at' => $readingList->created_at,
            'updated_at' => $readingList->updated_at,

        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }
}
