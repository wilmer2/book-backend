<?php

namespace App\Containers\Like\UI\API\Transformers;

use App\Containers\Like\Models\Like;
use App\Ship\Parents\Transformers\Transformer;
use Apiato\Core\Traits\HashIdTrait;


class LikeTransformer extends Transformer
{
    use HashIdTrait;

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
     * @param Like $like
     *
     * @return array
     */
    public function transform(Like $like)
    {
        $response = [
            'object' => 'Like',
            'id' => $like->getHashedKey(),
            'user_id' => $this->encode($like->user_id),
            'created_at' => $like->created_at,
            'updated_at' => $like->updated_at,
        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }
}
