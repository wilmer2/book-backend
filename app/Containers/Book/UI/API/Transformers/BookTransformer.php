<?php

namespace App\Containers\Book\UI\API\Transformers;

use App\Containers\Book\Models\Book;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use Apiato\Core\Traits\HashIdTrait;

class BookTransformer extends Transformer
{
    use HashIdTrait;

    /**
     * @var  array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'user',
    ];

    /**
     * @param Book $entity
     *
     * @return array
     */
    public function transform(Book $book)
    {
        $response = [
            'object' => 'Book',
            'id' => $book->getHashedKey(),
            'name' => $book->name,
            'description' => $book->description,
            'copyright' => $book->copyright,
            'category_id' => $this->encode($book->category_id),
            'image_url' => $book->file_url,
            'like_count' => $book->like_count,
            'views' => (int) $book->views,
            'created_at' => $book->created_at,
            'updated_at' => $book->updated_at,

        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }

    public function includeUser(Book $book) {
      return $this->item($book->user, new UserTransformer());
    }
}
