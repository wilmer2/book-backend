<?php

namespace App\Containers\BookProgress\UI\API\Controllers;

use App\Containers\BookProgress\UI\API\Requests\BookInProgressRequest;
use App\Containers\BookProgress\UI\API\Transformers\BookProgressTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\BookProgress\UI\API\Controllers
 */
class Controller extends ApiController
{
    public function bookInProgress(BookInProgressRequest $request)
    {
        $bookProgress = Apiato::call('BookProgress@BookInProgressAction', [$request]);

        return $this->transform($bookProgress, BookProgressTransformer::class);
    }
}
