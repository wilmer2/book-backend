<?php

namespace App\Containers\ReadingList\UI\API\Transformers;

use App\Containers\ReadingList\Models\ReadingList;
use App\Containers\Book\UI\API\Transformers\BookTransformer;
use App\Ship\Parents\Transformers\Transformer;

class ReadingListTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
      'books',

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param ReadingList $readinglist
     *
     * @return array
     */
    public function transform(ReadingList $readinglist)
    {
        $response = [
            'object' => 'ReadingList',
            'id' => $readinglist->getHashedKey(),
            'name' => $readinglist->name,
            'created_at' => $readinglist->created_at,
            'updated_at' => $readinglist->updated_at,

        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }

    public function includeBooks(ReadingList $readinglist)
    {
        return $this->collection($readinglist->books, new BookTransformer());
    }
}
