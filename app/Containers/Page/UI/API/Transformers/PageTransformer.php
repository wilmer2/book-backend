<?php

namespace App\Containers\Page\UI\API\Transformers;

use App\Containers\Page\Models\Page;
use App\Ship\Parents\Transformers\Transformer;

class PageTransformer extends Transformer
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
     * @param Page $entity
     *
     * @return array
     */
    public function transform(Page $entity)
    {
        $response = [
            'object' => 'Page',
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
