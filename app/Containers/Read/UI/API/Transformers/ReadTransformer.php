<?php

namespace App\Containers\Read\UI\API\Transformers;

use App\Containers\Read\Models\Read;
use App\Ship\Parents\Transformers\Transformer;

class ReadTransformer extends Transformer
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
     * @param Read $entity
     *
     * @return array
     */
    public function transform(Read $entity)
    {
        $response = [
            'object' => 'Read',
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
