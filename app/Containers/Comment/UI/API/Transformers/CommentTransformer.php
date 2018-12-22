<?php

namespace App\Containers\Comment\UI\API\Transformers;

use App\Containers\Comment\Models\Comment;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;


class CommentTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'user',
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Comment $entity
     *
     * @return array
     */
    public function transform(Comment $comment)
    {
        $response = [
            'object' => 'Comment',
            'id' => $comment->getHashedKey(),
            'body' => $comment->body,
            'like' => (int) $comment->like,
            'created_at' => $comment->created_at,
            'updated_at' => $comment->updated_at,
        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }

    public function includeUser(Comment $comment)
    {
        return $this->item($comment->user, new UserTransformer());
    }
}
