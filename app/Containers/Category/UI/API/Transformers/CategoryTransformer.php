<?php

namespace App\Containers\Category\UI\API\Transformers;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer;

class CategoryTransformer extends Transformer
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
     * @param Category $entity
     *
     * @return array
     */
    public function transform(Category $category)
    {
        $response = [
            'object' => 'Category',
            'id' => $category->getHashedKey(),
            'name' => $category->name,
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,

        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }
}
