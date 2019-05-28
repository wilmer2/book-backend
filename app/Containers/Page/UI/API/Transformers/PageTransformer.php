<?php

namespace App\Containers\Page\UI\API\Transformers;

use App\Containers\Page\Models\Page;
use App\Ship\Parents\Transformers\Transformer;
use Apiato\Core\Traits\HashIdTrait;

class PageTransformer extends Transformer
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
     * @param Page $page
     *
     * @return array
     */
    public function transform(Page $page)
    {
        $response = [
            'object' => 'Page',
            'id' => $page->getHashedKey(),
            'text' => $page->text,
            'title' => $page->title,
            'book_id' => $this->encode($page->book_id),
            'like_count' => $page->like_count,
            'image_url' => $page->file_url,
            'created_at' => $page->created_at,
            'updated_at' => $page->updated_at,
        ];

        /*$response = $this->ifAdmin([
            'real_id'    => $page->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);*/

        return $response;
    }
}
